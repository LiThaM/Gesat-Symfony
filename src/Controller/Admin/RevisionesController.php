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

        //llamamos a doctrine
        $em = $this->getDoctrine()->getManager();
        //Asiganamos la fecha de reparado
        $entity->getIdFichaSat()->setFechaReparado(new \DateTime());
        // activamos revisado tecnico a true
        if (!$entity->getIdFichaSat()->getRevisadoTecnico()) {
            $entity->getIdFichaSat()->setRevisadoTecnico(true);
        }
        //envio correo no funciona aun
        // $this->envioEmailRevision($entity);
        $em->persist($entity);
        $em->flush();
    }

    public function envioEmailRevision($entity, \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email!'))
            ->setFrom('bitspontevedra@gmail.com')
            ->setTo($entity->getIdFichaSat()->getNameClientes()->getEmail())
            ->setBody(
                $this->renderView(
                    // templates/emails/registration.html.twig
                    'correorevision.html.twig',
                    array('revision' => $entity)
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $mailer->send($message);
    
        //return $this->render(...);
    }
}
