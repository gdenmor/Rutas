<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiProvinciaController extends AbstractController
{
    #[Route('/api/provincia', name: 'app_api_provincia')]
    public function index(): Response
    {
        return $this->render('api_provincia/index.html.twig', [
            'controller_name' => 'ApiProvinciaController',
        ]);
    }
}
