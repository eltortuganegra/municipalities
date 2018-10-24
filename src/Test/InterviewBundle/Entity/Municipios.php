<?php

namespace Test\InterviewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipios
 *
 * @ORM\Table(name="municipios")
 * @ORM\Entity
 */
class Municipios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_municipio", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idMunicipio;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_provincia", type="smallint")
     */
    private $idProvincia;

    /**
     * @var integer
     *
     * @ORM\Column(name="cod_municipio", type="integer")
     */
    private $codMunicipio;

    /**
     * @var integer
     *
     * @ORM\Column(name="DC", type="integer")
     */
    private $dc;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;


    /**
     * Get idMunicipio
     *
     * @return integer
     */
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }

    /**
     * Set idProvincia
     *
     * @param integer $idProvincia
     *
     * @return Municipios
     */
    public function setIdProvincia($idProvincia)
    {
        $this->idProvincia = $idProvincia;

        return $this;
    }

    /**
     * Get idProvincia
     *
     * @return integer
     */
    public function getIdProvincia()
    {
        return $this->idProvincia;
    }

    /**
     * Set codMunicipio
     *
     * @param integer $codMunicipio
     *
     * @return Municipios
     */
    public function setCodMunicipio($codMunicipio)
    {
        $this->codMunicipio = $codMunicipio;

        return $this;
    }

    /**
     * Get codMunicipio
     *
     * @return integer
     */
    public function getCodMunicipio()
    {
        return $this->codMunicipio;
    }

    /**
     * Set dc
     *
     * @param integer $dc
     *
     * @return Municipios
     */
    public function setDc($dc)
    {
        $this->dc = $dc;

        return $this;
    }

    /**
     * Get dc
     *
     * @return integer
     */
    public function getDc()
    {
        return $this->dc;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Municipios
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
}

