<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="revisiones")
 */
class Revisiones{

     /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\ManyToOne(targetEntity="FichaSat", inversedBy="revisiones")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $idFichaSat;

    /**
     * @ORM\ManyToOne(targetEntity="EstadoAveria")
     * @ORM\JoinColumn(name="estado_averia", referencedColumnName="id")
     */
    private $estadoAveria; 

    /**
     * @ORM\Column(type="text")
     */
    private $descripcionAveria; 

    /**
     * @ORM\Column(type="datetime")
     */
    private $setUpdateAt;



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idFichaSat
     */ 
    public function getIdFichaSat()
    {
        return $this->idFichaSat;
    }

    /**
     * Set the value of idFichaSat
     *
     * @return  self
     */ 
    public function setIdFichaSat($idFichaSat)
    {
        $this->idFichaSat = $idFichaSat;

        return $this;
    }

    /**
     * Get the value of estadoAveria
     */ 
    public function getEstadoAveria()
    {
        return $this->estadoAveria;
    }

    /**
     * Set the value of estadoAveria
     *
     * @return  self
     */ 
    public function setEstadoAveria($estadoAveria)
    {
        $this->estadoAveria = $estadoAveria;

        return $this;
    }

    /**
     * Get the value of descripcionAveria
     */ 
    public function getDescripcionAveria()
    {
        return $this->descripcionAveria;
    }

    /**
     * Set the value of descripcionAveria
     *
     * @return  self
     */ 
    public function setDescripcionAveria($descripcionAveria)
    {
        $this->descripcionAveria = $descripcionAveria;

        return $this;
    }

    /**
     * Get the value of setUpdateAt
     */ 
    public function getSetUpdateAt()
    {
        return $this->setUpdateAt;
    }

    /**
     * Set the value of setUpdateAt
     *
     * @return  self
     */ 
    public function setSetUpdateAt($setUpdateAt)
    {
        $this->setUpdateAt = new \DateTime();

        return $this;
    }
     #CONSTRUCTOR
     public function __construct()
     {
         #añade la hora
         $this->setUpdateAt = new \DateTime();
         


     }

     public function __toString()
     {
          
         return $this->id."# [".$this->estadoAveria."]";
     }
}