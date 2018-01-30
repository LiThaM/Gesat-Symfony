<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="clientes")
 */
class Clientes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombreApellidos;
 
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $dni;
 
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

     /**
     * @ORM\Column(type="datetime")
     */
    private $fechaRegistro;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    


    /**
     * Get the value of nombreApellidos
     */ 
    public function getNombreApellidos()
    {
        return $this->nombreApellidos;
    }

    /**
     * Set the value of nombreApellidos
     *
     * @return  self
     */ 
    public function setNombreApellidos($nombreApellidos)
    {
        $this->nombreApellidos = $nombreApellidos;

        return $this;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of fechaRegistro
     */ 
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set the value of fechaRegistro
     *
     * @return  self
     */ 
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    ## Traspaso a String el ID para que Aparezca el nombre
    public function __toString()
    {
        return $this->nombreApellidos;
    }


    public function utcdatetime()
    {
        $this->created = new \DateTime("now");
    }

    /**
     * Gets triggered every time on update

     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated = new \DateTime("now");
    }
}
?>