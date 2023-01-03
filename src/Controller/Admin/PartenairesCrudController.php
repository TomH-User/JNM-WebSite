<?php

namespace App\Controller\Admin;

use App\Entity\Partenaires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PartenairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partenaires::class;
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
