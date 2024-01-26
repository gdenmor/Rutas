<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Tour;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\MakerBundle\Doctrine\RelationManyToOne;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class TourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tour::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('Ruta'),
            AssociationField::new('Guia'),
            TextField::new('titulo'),
            NumberField::new('numplazas'),
        ];
    }
    
}
