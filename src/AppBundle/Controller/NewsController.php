<?php

namespace AppBundle\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as EasyAdminController;

class NewsController extends EasyAdminController
{
    public function persistEntity($entity)
    {
        $this->updateSlug($entity);
        parent::persistEntity($entity);
    }

    public function updateEntity($entity)
    {
        $this->updateSlug($entity);
        parent::updateEntity($entity);
    }

    private function updateSlug($entity)
    {
        $slugger = $this->get('app.slugger');
        if (method_exists($entity, 'setSlug') and method_exists($entity, 'getTitle')) {
            $entity->setSlug($slugger->slugify($entity->getTitle()));
        }
    }
}
