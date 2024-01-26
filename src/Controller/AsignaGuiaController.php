<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AsignaGuiaController extends AbstractController
{
    #[Route('/asignaguia/{id}', name: 'app_asigna_guia')]
    public function index(): Response
    {
        
        return $this->render('asigna_guia/index.html.twig', [
            'controller_name' => 'AsignaGuiaController',
        ]);
    }
}
