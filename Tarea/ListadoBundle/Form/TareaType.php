<?php

namespace Tarea\ListadoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface; 

class TareaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descripcion','textarea');
        $builder->add('fechaRealizar', 'date');
        $builder->add('estado', 'checkbox', array(
            'label'     => '¿Se ha realizado la tarea?',
            'required'  => false));
        $builder->add('prioridad', 'choice', array(
            'choices' => array('alta' => 'alta', 'media' => 'media', 'baja' => 'baja')));
    }

    public function getName()
    {
        return 'Tarea';
    }
}

