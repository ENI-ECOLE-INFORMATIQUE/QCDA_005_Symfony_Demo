<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $cours= new Course();
        $cours->setName('Symfony');
        $cours->setContent('Le développement web côté Serveur avec Symfony');
        $cours->setDuration(10);
        $cours->setDateCreated(new \DateTimeImmutable('2025-09-01'));
        $manager->persist($cours);

        $cours= new Course();
        $cours->setName('PHP');
        $cours->setContent('Le développement web côté Serveur avec PHP');
        $cours->setDuration(5);
        $cours->setDateCreated(new \DateTimeImmutable('2025-08-01'));
        $manager->persist($cours);

        $cours= new Course();
        $cours->setName('Apache');
        $cours->setContent('Administration d\'un serveur Apache sous Linux');
        $cours->setDuration(5);
        $cours->setDateCreated(new \DateTimeImmutable('2024-05-01'));
        $manager->persist($cours);

        //Création de 30 cours supplémentaires
        for($i=1;$i<=30;$i++){
            $cours= new Course();
            $cours->setName("Cours $i");
            $cours->setContent("Description du cours $i");
            $cours->setDuration(mt_rand(1,10));
            $cours->setDateCreated(new \DateTimeImmutable());
            $manager->persist($cours);
        }

        $manager->flush();
    }
}
