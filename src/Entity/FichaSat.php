<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="entradas_sat")
 * @Vich\Uploadable
 */
class FichaSat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Clientes", inversedBy="fichas")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $nameClientes;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $modeloEquipo;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $imei;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $numeroSerie;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcionAveria;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codigoDesbloqueo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codigoPin;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $accesorios;

    /**
     * @var revisiones[]
     * @ORM\OneToMany(targetEntity="Revisiones", mappedBy="idFichaSat")
     */
    private $revisiones;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $revisadoTecnico = false;

    /**
    * @ORM\Column(type="boolean", nullable=true)
    */
    private $entregadoCliente = false;

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
     * @Vich\UploadableField(mapping="ficha_imagenes", fileNameProperty="imagen")
     * @var File
     */
    private $imagenFicha;

    public function setImagenFicha(File $imagen = null)
    {
        $this->imagenFicha = $imagen;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($imagen) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->fechaEntrada = new \DateTime('now');
        }
    }

    public function getImagenFicha()
    {
        return $this->imagenFicha;
    }

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $imagen;
    

    /**
     * @Vich\UploadableField(mapping="ficha_imagenes", fileNameProperty="imagen2")
     * @var File
     */
    private $imagenFicha2;


    public function setImagenFicha2(File $imagen2 = null)
    {
        $this->imagenFicha2 = $imagen2;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        // if ($imagenFicha2) {
        //     // // if 'updatedAt' is not defined in your entity, use another property
        //     // $this->fechaEntrada = new \DateTime('now');
        // }
    }

    public function getImagenFicha2()
    {
        return $this->imagenFicha2;
    }
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $imagen2;
    
    /**
     * @Vich\UploadableField(mapping="ficha_imagenes", fileNameProperty="imagen3")
     * @var File
     */
    private $imagenFicha3;


    public function setImagenFicha3(File $imagen3 = null)
    {
        $this->imagenFicha3 = $imagen3;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        // if ($imagenFicha) {
        //     // if 'updatedAt' is not defined in your entity, use another property
        //     $this->fechaEntrada = new \DateTime('now');
        // }
    }

    public function getImagenFicha3()
    {
        return $this->imagenFicha3;
    }
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $imagen3;
    

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
    public function __toString()
    {
        // Devolvemos
        // IMEI
        // ModeloEquipo
        // NombreCliente
        if ($this->imei) {
            return "[Modelo: ".$this->modeloEquipo."]-[IMEI: ".$this->imei."]-[Cliente: ".$this->nameClientes."]";
        } else {
            return "[Modelo: ".$this->modeloEquipo."]-[S/N: ".$this->numeroSerie."]-[Cliente: ".$this->nameClientes."]";
        }
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

    /**
     * Get the value of imei
     */
    public function getImei()
    {
        return $this->imei;
    }

    /**
     * Set the value of imei
     *
     * @return  self
     */
    public function setImei($imei)
    {
        $this->imei = $imei;

        return $this;
    }

    /**
     * Get the value of numeroSerie
     */
    public function getNumeroSerie()
    {
        return $this->numeroSerie;
    }

    /**
     * Set the value of numeroSerie
     *
     * @return  self
     */
    public function setNumeroSerie($numeroSerie)
    {
        $this->numeroSerie = $numeroSerie;

        return $this;
    }

    /**
     * Get the value of accesorios
     */
    public function getAccesorios()
    {
        return $this->accesorios;
    }

    /**
     * Set the value of accesorios
     *
     * @return  self
     */
    public function setAccesorios($accesorios)
    {
        $this->accesorios = $accesorios;

        return $this;
    }

    /**
     * Get the value of imagen3
     *
     * @return  string
     */
    public function getImagen3()
    {
        return $this->imagen3;
    }

    /**
     * Set the value of imagen3
     *
     * @param  string  $imagen3
     *
     * @return  self
     */
    public function setImagen3($imagen3)
    {
        $this->imagen3 = $imagen3;

        return $this;
    }

    /**
     * Get the value of imagen
     *
     * @return  string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @param  string  $imagen
     *
     * @return  self
     */
    public function setImagen($imagen)
    {
        return $this->imagen = $imagen;
    }

    /**
     * Get the value of imagen2
     *
     * @return  string
     */
    public function getImagen2()
    {
        return $this->imagen2;
    }

    /**
     * Set the value of imagen2
     *
     * @param  string  $imagen2
     *
     * @return  self
     */
    public function setImagen2($imagen2)
    {
        $this->imagen2 = $imagen2;

        return $this;
    }

    /**
     * Get the value of codigoPin
     */
    public function getCodigoPin()
    {
        return $this->codigoPin;
    }

    /**
     * Set the value of codigoPin
     *
     * @return  self
     */
    public function setCodigoPin($codigoPin)
    {
        $this->codigoPin = $codigoPin;

        return $this;
    }

    /**
     * Get the value of codigoDesbloqueo
     */
    public function getCodigoDesbloqueo()
    {
        return $this->codigoDesbloqueo;
    }

    /**
     * Set the value of codigoDesbloqueo
     *
     * @return  self
     */
    public function setCodigoDesbloqueo($codigoDesbloqueo)
    {
        $this->codigoDesbloqueo = $codigoDesbloqueo;

        return $this;
    }

    /**
     * Get the value of revisiones
     *
     * @return  revisiones[]
     */
    public function getRevisiones()
    {
        return $this->revisiones;
    }

    /**
     * Set the value of revisiones
     *
     * @param  revisiones[]  $revisiones
     *
     * @return  self
     */
    public function setRevisiones($revisiones)
    {
        return $this->revisiones = $revisiones;
    }
    #CONSTRUCTOR
    public function __construct()
    {
        #Creamos el array
        $this->revisiones = new ArrayCollection();
    }
}
