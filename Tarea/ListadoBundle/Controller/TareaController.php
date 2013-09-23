<?php

namespace Tarea\ListadoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// Importa el nuevo espacio de nombres
use Tarea\ListadoBundle\Entity\Tarea;
use Tarea\ListadoBundle\Form\TareaType;

class TareaController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()
                ->getManager();

        $tareas = $em->getRepository('TareaListadoBundle:Tarea')
                ->getTareas();



        return $this->render('TareaListadoBundle:Tarea:listado.html.twig', array(
                    'tareas' => $tareas
        ));
        //print_r($tareas);
    }

    public function createAction() {
        $tarea = new Tarea();
        $form = $this->createForm(new TareaType(), $tarea);

        $peticion = $this->getRequest();
        if ($peticion->isMethod('POST')) {
                   
            $form->bind($peticion);
            if ($form->isValid()) {
                $em = $this->getDoctrine()
                        ->getEntityManager();
                $em->persist($tarea);
                $em->flush();
     
                return $this->redirect($this->generateUrl('homepage'));
                
            }
            //else echo $form->getErrorsAsString();
        }


        return $this->render('TareaListadoBundle:Tarea:nueva.html.twig', array(
                    'form' => $form->createView()
        ));
    }
    
    public function deleteAction($idTarea){
        
        $em = $this->getDoctrine()->getEntityManager();
        $tarea = $em->getRepository('TareaListadoBundle:Tarea')->find($idTarea);

        if (!$tarea) {
            throw $this->createNotFoundException('No se ha encontrado la tarea solicitada');
        }

        $em->remove($tarea);
        $em->flush();
        
        $this->get('session')->getFlashBag()->add('notice', '!La tarea ha sido eliminada correctamente!');       
        return $this->redirect($this->generateUrl('homepage'));
        
        
    }
    
    public function editAction($idTarea){
        $em = $this->getDoctrine()->getEntityManager();
        $tarea = $em->getRepository('TareaListadoBundle:Tarea')->find($idTarea);
        
        if (!$tarea) {
            throw $this->createNotFoundException('No se ha encontrado la tarea solicitada');
        }
        
        $editForm = $this->createForm(new TareaType(), $tarea);
        
        $peticion = $this->getRequest();        
        if ($peticion->isMethod('POST')) {
            $editForm->bind($peticion);
            if ($editForm->isValid()) {
                $em->persist($tarea);
                $em->flush();   
                 $this->get('session')->getFlashBag()->add('notice', '!Los ultimos cambios en la tarea han sido guardados!');
                return $this->redirect($this->generateUrl('homepage'));
                
            }
        }
        
        return $this->render('TareaListadoBundle:Tarea:editar.html.twig', array(
            'tarea'      => $tarea,
            'form'   => $editForm->createView()
        ));
    }
    
    

}
