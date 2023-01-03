<?php

namespace App\Controller\Admin;

use App\Entity\Activites;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActivitesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Activites::class;
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
