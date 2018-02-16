<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\Common\Collections\ArrayCollection;


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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $apellidos;
    

    /**
     * @ORM\Column(type="text")
     */
    private $direccion;
    

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $dni;
 
    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telefonoFijo;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $movil;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
    */
    private $fechaRegistro;

    /**
     * @var fichas[]
     * @ORM\OneToMany(targetEntity="FichaSat", mappedBy="nameClientes")
     */
    private $fichas;

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
     * @return \DateTime
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
        $this->fechaRegistro = new \DateTime('now');

        return $this;
    }
    
    public function __toString()
    {
        return $this->id."# ".$this->nombre." ".$this->apellidos;
    }

    /**
     * Get the value of movil
     */
    public function getMovil()
    {
        return $this->movil;
    }

    /**
     * Set the value of movil
     *
     * @return  self
     */
    public function setMovil($movil)
    {
        $this->movil = $movil;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of telefonoFijo
     */
    public function getTelefonoFijo()
    {
        return $this->telefonoFijo;
    }

    /**
     * Set the value of telefonoFijo
     *
     * @return  self
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefonoFijo = $telefonoFijo;

        return $this;
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    #CONSTRUCTOR
    public function __construct()
    {
        #añade la hora
        $this->fechaRegistro = new \DateTime();
        #Creamos el array
        $this->fichas = new ArrayCollection();
    }

    /**
     * Get the value of fichas
     *
     * @return  fichas[]
     */ 
    public function getFichas()
    {
        return $this->fichas;
    }

    /**
     * Set the value of fichas
     *
     * @param  fichas[]  $fichas
     *
     * @return  self
     */ 
    public function setFichas($fichas)
    {
        return $this->fichas = $fichas;
    }
}
