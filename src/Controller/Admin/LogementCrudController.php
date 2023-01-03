<?php

namespace App\Controller\Admin;

use App\Entity\Logement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LogementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Logement::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
