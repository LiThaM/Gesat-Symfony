<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

/**
 * This is an example of how to use a custom controller for a backend entity.
 */
class RevisionesController extends BaseAdminController
{
    public function persistEntity($entity)
    {
        if($this->controlErrors($entity)){
            return $this->redirectToRoute('admin', ['entity' => 'Revisiones', 'action'=>'list']);  
        } else {
            if (method_exists($entity, 'getIdFichaSat')) {
                $this->revisionTerminal($entity);
            }
            parent::persistEntity($entity);
        }

    }
    public function updateEntity($entity){
        if($this->controlErrors($entity))
        {
            return $this->redirectToRoute('admin', ['entity' => 'Revisiones', 'action'=>'list']);  

        }
        parent::updateEntity($entity);  
    }
    public function controlErrors($entity)
    {
        $error = 0;
        if($entity->getIdFichaSat() == null){
            $error++;
            $this->addFlash('error', 'Te falta vincular la ficha a la que hace referencia.');
        }
        if($entity->getImagenRevision()){
            if($entity->getImagenRevision()->getError() == 1) {
                $error++;
                $this->addFlash('error', 'Error con la imagen demasiado grande o otro tipo de error.');     
            }
        }
        if($error > 0) return true; else return false;
    }
    public function revisionTerminal($entity)
    {
        //Asiganamos la fecha de reparado
        if ($entity->getIdFichaSat()) {
            //Doctrine
            $em = $this->getDoctrine()->getManager();
            $entity->getIdFichaSat()->setFechaReparado(new \DateTime());
            if (!$entity->getIdFichaSat()->getRevisadoTecnico()) {
                $entity->getIdFichaSat()->setRevisadoTecnico(true);
            }
            //envio correo no funciona aun
            //$this->envioEmailRevision($entity);
            $em->persist($entity);
            $em->flush();
        }
    }

    // public function envioEmailRevision($entity)
    // {
    //     $message = (new \Swift_Message('[GESAT] Revisión:'))
    //         ->setFrom('bitspontevedra@gmail.com')
    //         ->setTo($entity->getIdFichaSat()->getNameClientes()->getEmail())
    //         ->setBody(
    //             $this->renderView(
    //                 'correorevision.html.twig',
    //                 array('revision' => $entity)
    //             ),
    //             'text/html'
    //         )
    //     ;
    //     $this->get('mailer')->send($message);
    // }
}
