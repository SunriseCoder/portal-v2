<?php

namespace App\Controller\Admin;

use App\Entity\Tracker\Event;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Event')
            ->setEntityLabelInPlural('Events')
            ->setSearchFields(['name', 'startDate', 'endDate'])
            ->setDefaultSort(['startDate' => 'DESC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('type');
        yield TextField::new('name');
        yield DateField::new('startDate')
            ->setFormTypeOptions([
                'html5' => true,
                'widget' => 'single_text'
            ]);
        yield DateField::new('endDate')
            ->setFormTypeOptions([
                'html5' => true,
                'widget' => 'single_text'
            ]);
    }
}
