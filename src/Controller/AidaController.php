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
    #[Route('/more', name: 'app_more')]
    public function more(): Response
    {
        return $this->render('more/more.html.twig');
    }  

    #[Route('/confidentialites', name: 'app_confidentialites')]
    public function confidentialites(): Response
    {
        return $this->render('confidentialites/confidentialites.html.twig');
    }  

    #[Route('/conditions', name: 'app_conditions')]
    public function conditions(): Response
    {
        return $this->render('conditions/conditions.html.twig');
    }  
}
    // src/Controller/CVController.php
namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CVController extends AbstractController
{
    
     #[Route('/cv/downloadCV', name: 'downloadCV')]
     
    public function downloadCV(): Response
    {
        // Créer une instance de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        // Récupérer le contenu HTML de la page de ton CV
        $html = $this->renderView('awa/awa.html.twig'); // Assure-toi que le chemin est correct

        // Charger le HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Définir la taille du papier et l'orientation (A4 en portrait)
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le PDF
        $dompdf->render();

        // Générer le PDF dans le flux de réponse HTTP
        $pdfContent = $dompdf->output();

        // Retourner la réponse avec le PDF (téléchargement)
        return new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="cv.pdf"', // Le fichier PDF se télécharge
        ]);
    }
}
