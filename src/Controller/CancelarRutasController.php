<?php

namespace App\Controller;

use App\Repository\RutaRepository;
use App\Repository\TourRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CancelarRutasController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/listarutas', name: 'app_lista_rutas')]
    public function index(Request $request,TourRepository $tours): Response
    {
        $tour=$tours->findBy(['estado'=>"ACTIVADO"]);
        return $this->render('cancelar_rutas/index.html.twig', [
            'rutas'=>$tour
        ]);
    }
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/cancelaruta/{id}', name: 'app_cancela_ruta')]
    public function cancelaRuta(Request $request,TourRepository $tours,$id,EntityManagerInterface $entity)
    {
        $tour=$tours->findBy(['id'=>$id]);
        for ($i=0;$i<count($tour);$i++){
            $tour[$i]->setEstado("CANCELADO");
            $entity->persist($tour[$i]);
            $entity->flush();
        }
        return $this->redirectToRoute('app_lista_rutas');
    }
}
