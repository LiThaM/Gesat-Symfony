<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

/**
 * This is an example of how to use a custom controller for a backend entity.
 */
class FichaSatController extends BaseAdminController
{
    public function persistEntity($entity)
    {
        if(method_exists($entity, 'getNameClientes')){
            if($entity->getNameClientes() == null & $entity->getImagenFicha() == null){
                $this->addFlash('error', 'Te falta introducir el cliente o la primera imágen.');
                return; 
            }

        }
        parent::persistEntity($entity);
        if (method_exists($entity, 'getUid')) {
            $this->generadorUID($entity);
        }
    }

    public function updateEntity($entity)
    {
        if($entity->getNameClientes() == null & $entity->getImagenFicha() == null){
            $this->addFlash('error', 'Te falta introducir el cliente o la primera imágen.');
            return; 
        }
        parent::updateEntity($entity);
        if (method_exists($entity, 'getUid')) {
            if (!$entity->getUid()) {
                $this->generadorUID($entity);
            }
        }
    }

    public function generadorUID($entity)
    {
            $em = $this->getDoctrine()->getManager();
            //generamos UID a base de uniqueID imagen
            $key = substr($entity->getImagen(), 0, 22);
            $entity->setUid($key);
            $em->persist($entity);
            $em->flush();
        
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
    public function imprimirTicketAction()
    {
        //Recorro con el id del action
        $id = $this->request->query->get('id');
        //recojo los datos de esa entidad
        $entity = $this->em->getRepository('App:FichaSat')->find($id);
        //recorro su Join de Clientes
        $entityClientes = $this->em->getRepository('App:Clientes')->find($entity->getNameClientes('id'));
        
        //Lanzamos el View
        return $this->render(
            'imprimirtickets.html.twig',
            array('fichas' => $entity, 'clientes' => $entityClientes)
        );
    }
    /**
     * This method overrides the default query builder used to search for this
     * entity. This allows to make a more complex search joining related entities.
     */
    // protected function createSearchQueryBuilder($entityClass, $searchQuery, array $searchableFields, $sortField = null, $sortDirection = null, $dqlFilter = null)
    // {
    //     /* @var EntityManager */
    //     $em = $this->getDoctrine()->getManagerForClass($this->entity['class']);
    //     /* @var DoctrineQueryBuilder */
    //     $queryBuilder = $em->createQueryBuilder()
    //         ->select('entity')
    //         ->from($this->entity['class'], 'entity')
    //         ->join('entity.revisiones', 'revisiones')
    //         ->orWhere('LOWER(revisiones.id_ficha_sat) LIKE :query')
    //         ->setParameter('query', '%'.strtolower($searchQuery).'%')
    //     ;

    //     if (!empty($dqlFilter)) {
    //         $queryBuilder->andWhere($dqlFilter);
    //     }

    //     if (null !== $sortField) {
    //         $queryBuilder->orderBy('entity.'.$sortField, $sortDirection ?: 'DESC');
    //     }

    //     return $queryBuilder;
    // }
}
