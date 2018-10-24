<?php

namespace Test\InterviewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comunidades
 *
 * @ORM\Table(name="comunidades")
 * @ORM\Entity
 */
class Comunidades
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_comunidad", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idComunidad;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;


    /**
     * Get id
     *
     * @return integer
     */
    public function getIdComunidad()
    {
        return $this->idComunidad;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Comunidades
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

