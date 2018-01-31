<?php

namespace App\Entity; 

use Doctrine\ORM\Mapping as ORM; 

/**
 * @ORM\Entity
 * @ORM\Table(name="entradas_sat")
 */
class FichaSat {
/**
 * @ORM\Id
 * @ORM\GeneratedValue
 * @ORM\Column(type="integer")
 */
private $id; 

/**
 * @ORM\ManyToOne(targetEntity="App\Entity\Clientes")
 * @ORM\JoinColumn(name="clientes", referencedColumnName="id")
 */
private $nameClientes; 

/**
 * @ORM\Column(type="string", length=100)
 */
private $modeloEquipo; 

/**
 * @ORM\Column(type="string", length=100)
 */
private $imeiSn; 

/**
 * @ORM\Column(type="text")
 */
private $descripcionAveria; 

/**
 * @ORM\Column(type="boolean", nullable=true)
 */
private $revisadoTecnico;

 /**
 * @ORM\Column(type="boolean", nullable=true)
 */
private $entregadoCliente;

/**
 * @ORM\Column(type="datetime")
 */
private $fechaEntrada; 

/**
 * @ORM\Column(type="datetime", nullable=true)
 */
private $fechaReparado; 

/**
 * @ORM\Column(type="datetime", nullable=true)
 */
private $fechaEntregado; 

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}


/**
 * Get the value of modeloEquipo
 */ 
public function getModeloEquipo()
{
return $this->modeloEquipo;
}

/**
 * Set the value of modeloEquipo
 *
 * @return  self
 */ 
public function setModeloEquipo($modeloEquipo)
{
$this->modeloEquipo = $modeloEquipo;

return $this;
}

/**
 * Get the value of imeiSn
 */ 
public function getImeiSn()
{
return $this->imeiSn;
}

/**
 * Set the value of imeiSn
 *
 * @return  self
 */ 
public function setImeiSn($imeiSn)
{
$this->imeiSn = $imeiSn;

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
 * Get the value of revisadoTecnico
 */ 
public function getRevisadoTecnico()
{
return $this->revisadoTecnico;
}

/**
 * Set the value of revisadoTecnico
 *
 * @return  self
 */ 
public function setRevisadoTecnico($revisadoTecnico)
{
$this->revisadoTecnico = $revisadoTecnico;

return $this;
}

/**
 * Get the value of entregadoCliente
 */ 
public function getEntregadoCliente()
{
return $this->entregadoCliente;
}

/**
 * Set the value of entregadoCliente
 *
 * @return  self
 */ 
public function setEntregadoCliente($entregadoCliente)
{
$this->entregadoCliente = $entregadoCliente;

return $this;
}

/**
 * Get the value of fechaEntrada
 */ 
public function getFechaEntrada()
{
return $this->fechaEntrada;
}


/**
 * Get the value of nameClientes
 */ 
public function getNameClientes()
{
return $this->nameClientes;
}

/**
 * Set the value of nameClientes
 *
 * @return  self
 */ 
public function setNameClientes($nameClientes)
{
$this->nameClientes = $nameClientes;

return $this;
}
public function __toString()   {
return $this->modeloEquipo;
}

/**
 * Set the value of fechaEntrada
 *
 * @return  self
 */ 
public function setFechaEntrada($fechaEntrada)
{
$this->fechaEntrada = $fechaEntrada;

return $this;
}

/**
 * Get the value of fechaReparado
 */ 
public function getFechaReparado()
{
return $this->fechaReparado;
}

/**
 * Set the value of fechaReparado
 *
 * @return  self
 */ 
public function setFechaReparado($fechaReparado)
{
$this->fechaReparado = $fechaReparado;

return $this;
}

/**
 * Get the value of fechaEntregado
 */ 
public function getFechaEntregado()
{
return $this->fechaEntregado;
}

/**
 * Set the value of fechaEntregado
 *
 * @return  self
 */ 
public function setFechaEntregado($fechaEntregado)
{
$this->fechaEntregado = $fechaEntregado;

return $this;
}
}
