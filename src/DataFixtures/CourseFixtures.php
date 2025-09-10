<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Permet d'utiliser Faker
        $faker = \Faker\Factory::create('fr_FR');

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
        /*for($i=1;$i<=30;$i++){
            $cours= new Course();
            $cours->setName("Cours $i");
            $cours->setContent("Description du cours $i");
            $cours->setDuration(mt_rand(1,10));
            $cours->setDateCreated(new \DateTimeImmutable());
            $manager->persist($cours);
        }*/

        for($i=1;$i<=30;$i++){
            $cours= new Course();
            $cours->setName($faker->word());
            $cours->setContent($faker->realText());
            $cours->setDuration(mt_rand(1,10));
            $dateCreated=$faker->dateTimeBetween('-2 months', 'now');
            $cours->setDateCreated(\DateTimeImmutable::createFromMutable( $dateCreated));
            $dateModified=$faker->dateTimeBetween($dateCreated->format('Y-m-d'), 'now');
            $cours->setDateModified(\DateTimeImmutable::createFromMutable( $dateModified));
            $manager->persist($cours);
        }

        $manager->flush();
    }
}
