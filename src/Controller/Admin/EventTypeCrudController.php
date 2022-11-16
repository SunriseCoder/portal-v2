<?php

namespace App\Controller\Admin;

use App\Entity\Tracker\EventType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EventTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EventType::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Event Type')
            ->setEntityLabelInPlural('Event Types')
            ->setSearchFields(['code', 'name'])
            ->setDefaultSort(['code' => 'ASC']);
    }
}
