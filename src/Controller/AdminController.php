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
            $this->cambioRevisado($entity);
        }

        parent::persistEntity($entity);
    }
    
    public function cambioRevisado($entity)
    {
        if (method_exists($entity, 'getIdFichaSat')) {
            if($entity->getIdFichaSat()->getRevisadoTecnico() == false) {
                $entity->getIdFichaSat()->setRevisadoTecnico(true);   
            } 
        }
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
}
