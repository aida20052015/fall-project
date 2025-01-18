<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AidaController extends AbstractController
{
    #[Route('/aida', name:'app_aida')]
    public function index(): Response
        {
        return $this->render('aida/index.html.twig', [
            'controller_name' => 'AidaController',
        ]);
    }

   
  
    #[Route('/home', name:'app_home')]
    public function home(): Response
    {
        return $this->render('home/home.html.twig', [
            'title' => "bienvenue",
            'age' => 11
        ]);
    }
    
    #[Route('/adja', name:'app_adja')]
    public function adja(): Response
    {
        return $this->render('adja/adja.html.twig', [
            
        ]);
        
    }
    
    #[Route('/awa', name:'app_awa')]
    public function awa(): Response
    {
        return $this->render('awa/awa.html.twig', [
            
        ]);
        
    }
       
    #[Route('/demonstration', name:'app_demonstration')]
    public function demonstration(): Response
    {
        return $this->render('demonstration/demonstration.html.twig', [
            
        ]);
        
    }     
}