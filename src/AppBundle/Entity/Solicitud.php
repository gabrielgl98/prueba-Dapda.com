<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Solicitud
 *
 * @ORM\Table(name="solicitud")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SolicitudRepository")
 */
class Solicitud
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=255)
     * @Assert\NotBlank(message = "El campo Nombre no puede ser nulo")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Apellidos", type="string")
    * @Assert\NotBlank(message = "El campo Apellidos no puede ser nulo")
     */
    private $apellidos;

    /**
     * @var int
     *
     * @ORM\Column(name="Telefono", type="integer", nullable=true)
    * @Assert\Regex(
    *     pattern="/^[9|6|7][0-9]{8}$/",
    *     message="El Teléfono deberá empezar por 6, 7 o 9 y deberá tener 9 dígitos"
    * )
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255)
     * @Assert\NotBlank(message = "El campo Email no puede ser nulo")
     * @Assert\Email(
    *     message = "El email no es Válido",
    *     checkMX = true
    * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="TipoVehiculo", type="string", length=255)
     * @Assert\NotBlank(message = "El campo Tipo de Vehiculo no puede ser nulo")
     * @Assert\Choice(choices={"Turismo", "Comercial", "Todo Terreno"}, message="Escoja un Tipo de Vehículo Valido")
    * )
     */
    private $tipoVehiculo;

    /**
     * @var string
     *
     * @ORM\Column(name="Vehiculo", type="string", length=255)
     * @Assert\NotBlank(message = "El campo Vehiculo no puede ser nulo")
    * @Assert\Choice(choices={"Mokka", "Corsa", "Astra", "Crossland"}, message="Escoja un Vehículo Valido")
     */
    private $vehiculo;

    /**
     * @var string
     *
     * @ORM\Column(name="PreferenciaLlamada", type="string", length=255)
     * @Assert\NotBlank(message = "El campo Preferencia de LLamada no puede ser nulo")
     * @Assert\Choice(choices={"Mañana", "Tarde", "Noche"}, message="Escoja una Preferencia de Llamada Valida")
     */
    private $preferenciaLlamada;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Solicitud
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Solicitud
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return Solicitud
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return int
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Solicitud
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tipoVehiculo
     *
     * @param string $tipoVehiculo
     *
     * @return Solicitud
     */
    public function setTipoVehiculo($tipoVehiculo)
    {
        $this->tipoVehiculo = $tipoVehiculo;

        return $this;
    }

    /**
     * Get tipoVehiculo
     *
     * @return string
     */
    public function getTipoVehiculo()
    {
        return $this->tipoVehiculo;
    }

    /**
     * Set vehiculo
     *
     * @param string $vehiculo
     *
     * @return Solicitud
     */
    public function setVehiculo($vehiculo)
    {
        $this->vehiculo = $vehiculo;

        return $this;
    }

    /**
     * Get vehiculo
     *
     * @return string
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    /**
     * Set preferenciaLlamada
     *
     * @param string $preferenciaLlamada
     *
     * @return Solicitud
     */
    public function setPreferenciaLlamada($preferenciaLlamada)
    {
        $this->preferenciaLlamada = $preferenciaLlamada;

        return $this;
    }

    /**
     * Get preferenciaLlamada
     *
     * @return string
     */
    public function getPreferenciaLlamada()
    {
        return $this->preferenciaLlamada;
    }
}
