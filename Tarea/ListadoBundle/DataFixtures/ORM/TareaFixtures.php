<?php

namespace Tarea\ListadoBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Tarea\ListadoBundle\Entity\Tarea;

class TareaFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Tarea1 = new Tarea();
        $Tarea1->setDescripcion('Pasear al Yorkie');
        $Tarea1->setFechaRealizar(new \DateTime('2013-5-1'));
        $Tarea1->setEstado(false);
        $Tarea1->setPrioridad('alta');
        $manager->persist($Tarea1);
        
        $Tarea2 = new Tarea();
        $Tarea2->setDescripcion('Comprar Pan');
        $Tarea2->setFechaRealizar(new \DateTime('2013-5-2'));
        $Tarea2->setEstado(false);
        $Tarea2->setPrioridad('media');
        $manager->persist($Tarea2);
        
        $Tarea3 = new Tarea();
        $Tarea3->setDescripcion('Hacer footing');
        $Tarea3->setFechaRealizar(new \DateTime('2013-5-2'));
        $Tarea3->setEstado(true);
        $Tarea3->setPrioridad('baja');
        $manager->persist($Tarea3);
        
        $Tarea4 = new Tarea();
        $Tarea4->setDescripcion('ir al veterinario');
        $Tarea4->setFechaRealizar(new \DateTime('2013-5-2'));
        $Tarea4->setEstado(false);
        $Tarea4->setPrioridad('alta');
        $manager->persist($Tarea4);
        
        $manager->flush();
    }
}