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

    
   public function createNewUserEntity()
   {
       return $this->get('fos_user.user_manager')->createUser();
   }
 
   public function prePersistUserEntity($user)
   {
       $this->get('fos_user.user_manager')->updateUser($user, false);
   }
 
   public function preUpdateUserEntity($user)
 
   {
       $this->get('fos_user.user_manager')->updateUser($user, false);
   }
 
 
}
