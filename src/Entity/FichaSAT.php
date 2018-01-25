<?php

namespace App\Entity; 

use Doctrine\ORM\Mapping as ORM; 

/**
 * @ORM\Entity
 * @ORM\Table(name="entradas_sat")
 */
class FichaSAT {
/**
 * @ORM\Id
 * @ORM\GeneratedValue
 * @ORM\Column(type="integer")
 */
public $id; 

/**
 * @ORM\Column(type="integer")
 */
public $id_cliente; 

/**
 * @ORM\Column(type="string", length=100)
 */
public $modelo; 

/**
 * @ORM\Column(type="string", length=100)
 */
public $imei; 

/**
 * @ORM\Column(type="text")
 */
public $description; 

/**
 * @ORM\Column(type="boolean")
 */
public $revisado_tecnico;

 /**
 * @ORM\Column(type="boolean")
 */
public $entregado_cliente;

/**
 * @ORM\Column(type="date")
 */
public $fecha_entrada; 
}
?>