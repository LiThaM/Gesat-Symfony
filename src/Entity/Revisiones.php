<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="estados_revisiones")
 */
class Revisiones{

     /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FichaSat")
     * @ORM\JoinColumn(name="clientes", referencedColumnName="id")
     */
    private $idFichaSat;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $estadoAveria; 

    /**
     * @ORM\Column(type="text")
     */
    private $descripcionAveria; 



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
}