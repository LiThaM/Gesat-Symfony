<?php

namespace App\Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
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
    public $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    public $nombre_apellidos;
 
    /**
     * @ORM\Column(type="string", length=10)
     */
    public $dni;
 
    /**
     * @ORM\Column(type="string", length=10)
     */
    public $telefono;

     /**
     * @ORM\Column(type="date")
     */
    public $fecha_registro;
}
?>