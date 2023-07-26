<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use App\Entity\ServiceItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceItem::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('service', 'Choose service')->setFormTypeOptions(['by_reference' => true]),
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('name'),
            NumberField::new('price'),
            NumberField::new('length')
        ];
    }

}
