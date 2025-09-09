<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends  AbstractController
{
    #[Route('/', name: 'main_home', methods: ['GET'])]
    public function home(){
        //return new Response("<html><h1>Accueil</h1></html>");
        return $this->render('main/home.html.twig');
    }

    #[Route('/test', name: 'main_test', methods: ['GET'])]
    public function test(){
        //return new Response("<html><h1>Test</h1></html>");
        $serie = [
            "title"=>"<h1>Game of Thrones</h1>",
            "year"=>2010
        ];
        return $this->render('main/test.html.twig', [
            'mySerie'=>$serie,
            "autreVar"=>4242
        ]
        );
    }
}