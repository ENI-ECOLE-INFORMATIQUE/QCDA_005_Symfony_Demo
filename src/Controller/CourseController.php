<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CourseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cours', name: 'cours_')]
final class CourseController extends AbstractController
{
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(CourseRepository $courseRepository): Response
    {
        //Aller chercher la liste des cours dans la BD.
       // $courses = $courseRepository->findAll();
       // $courses = $courseRepository->findBy([], ['name' => 'DESC'],5);
        $courses = $courseRepository->findLastCourses();
        return $this->render('course/list.html.twig', [
            'courses' => $courses,
        ]);
    }
    #[Route('/{id}', name: 'show', requirements:['id'=>'\d+'], methods: ['GET'])]
    //public function show(int $id,CourseRepository $courseRepository): Response
    //Technique parameter-conversion en mettant l'objet dans l'attribut de la fonction
    // plus besoin de faire le find il le fait pour nous.
    public function show(Course $course,CourseRepository $courseRepository): Response
    {
        //Rechercher le cours en fonction de son id dans la BD.
        //$course = $courseRepository->find($id);
        //Si le cours n'est pas trouvé retourne une erreur 404.
       // if(!$course){
       //     throw $this->createNotFoundException('Cours inconnu');
        //}
        return $this->render('course/show.html.twig', [
            'course' => $course,
        ]);
    }

    #[Route('/ajouter', name: 'create', methods: ['GET','POST'])]
    public function create(Request $request): Response
    {
        dump($request);
        return $this->render('course/create.html.twig', [

        ]);
    }

    #[Route('/{id}/modifier', name: 'edit', methods: ['GET','POST'])]
    public function edit(int $id): Response
    {
        //TODO Rechercher le cours en fonction de son id dans la BD.
        return $this->render('course/edit.html.twig', [

        ]);
    }
    #[Route('/demo', name: 'demo', methods: ['GET'])]
    public function demo(EntityManagerInterface $em): Response{
        //Créer une instance de l'entité.
        $course = new Course();

        //hydrater toutes les propriétés.
        $course->setName('Symfony');
        $course->setContent('Le développement Web côté serveur avec Symfony');
        $course->setDuration(10);
        $course->setDateCreated(new \DateTimeImmutable());
        $em->persist($course);

        dump($course);
        $em->persist($course);
        //Ne pas oublier le flush() sinon l'objet ne sera pas persisté en base.
        $em->flush();
        dump($course);

        //On modifie l'objet
        $course->setName('PHP');
        //On sauvegarde l'objet
        // Pas besoin de faire le persist car Doctrine connait deja l'objet.
        $em->flush();
        dump($course);

        $em->remove($course);
        $em->flush();

        return $this->render('course/create.html.twig', []);
    }
}






















