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
        if (method_exists($entity, 'getIdFichaSat')) {
            $this->revisionTerminal($entity);
        }

        parent::persistEntity($entity);
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

    public function envioEmailRevision($entity)
    {
        $message = (new \Swift_Message('[GESAT] Revisión:'))
            ->setFrom('bitspontevedra@gmail.com')
            ->setTo($entity->getIdFichaSat()->getNameClientes()->getEmail())
            ->setBody(
                $this->renderView(
                    'correorevision.html.twig',
                    array('revision' => $entity)
                ),
                'text/html'
            )
        ;
        $this->get('mailer')->send($message);
    }
}
