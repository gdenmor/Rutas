<?php

namespace App\Controller\Admin;

use App\Entity\Informe;
use App\Entity\Item;
use App\Entity\Localidad;
use App\Entity\Provincia;
use App\Entity\Ruta;
use App\Entity\Tour;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractDashboardController
{
    //#[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Free tour')
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section("ENTIDADES");
        yield MenuItem::linkToCrud('User', 'fa fa-user',User::class);
        yield MenuItem::linkToCrud('Tour', 'fa fa-tag',Tour::class);
        yield MenuItem::linkToCrud('Ruta', 'fa fa-tag',Ruta::class);
        yield MenuItem::linkToCrud('Provincia', 'fa fa-star',Provincia::class);
        yield MenuItem::linkToCrud('Localidad', 'fa fa-star',Localidad::class);
        yield MenuItem::linkToCrud('Item', 'fa fa-tag',Item::class);
        yield MenuItem::linkToCrud('Informe', 'fa fa-tag',Informe::class);
    }

    /*public function configureActions(): Actions{
        return parent::configureActions()->add(Crud::PAGE_INDEX,Action::DETAIL);
    }*/
}
