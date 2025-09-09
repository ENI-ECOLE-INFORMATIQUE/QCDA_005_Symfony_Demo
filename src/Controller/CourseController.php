<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cours', name: 'cours_')]
final class CourseController extends AbstractController
{
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(): Response
    {
        //TODO : Aller chercher la liste des cours dans la BD.
        return $this->render('course/list.html.twig', [

        ]);
    }
    #[Route('/{id}', name: 'show', requirements:['id'=>'\d+'], methods: ['GET'])]
    public function show(int $id): Response
    {
        //TODO Rechercher le cours en fonction de son id dans la BD.
        return $this->render('course/show.html.twig', [

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
}
