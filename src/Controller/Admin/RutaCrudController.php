<?php

namespace App\Controller\Admin;

use App\Entity\Ruta;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RutaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ruta::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titulo'),
            TextEditorField::new('descripcion'),
            ImageField::new('foto')->setUploadDir('public/css/imagenes')->setBasePath('css/imagenes'),
            ChoiceField::new('estado')->setChoices([
                'ACTIVADO'=>"ACTIVADO",
                'CANCELADO'=>"CANCELADO"
            ]),
            AssociationField::new('Localidad'),
            DateTimeField::new('fecha_inicio'),
            DateTimeField::new('fecha_fin')
        ];
    }
}
