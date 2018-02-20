<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as EasyAdminController;

class AdminController extends EasyAdminController
{
    // ...
    /** @var array The full configuration of the entire backend */
    protected $config;
    /** @var array The full configuration of the current entity */
    protected $entity;
    /** @var Request The instance of the current Symfony request */
    protected $request;
    /** @var EntityManager The Doctrine entity manager for the current entity */
    protected $em;

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
        $entity->getIdFichaSat()->setFechaReparado(new \DateTime());
        //activamos revisado tecnico a true
        if ($entity->getIdFichaSat()->getRevisadoTecnico() == false) {
            $entity->getIdFichaSat()->setRevisadoTecnico(true);
        }
        //envio correo
        $this->envioEmailRevision($entity);
    }

    public function imprimirFichaAction()
    {
        //Recorro con el id del action
        $id = $this->request->query->get('id');
        //recojo los datos de esa entidad
        $entity = $this->em->getRepository('App:FichaSat')->find($id);
        //recorro su Join de Clientes
        $entityClientes = $this->em->getRepository('App:Clientes')->find($entity->getNameClientes('id'));
        
        //Lanzamos el View
        return $this->render(
            'imprimirficha.html.twig',
            array('fichas' => $entity, 'clientes' => $entityClientes)
        );
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
