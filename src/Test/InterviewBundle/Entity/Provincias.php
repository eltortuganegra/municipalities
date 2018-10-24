<?php

namespace Test\InterviewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * provincias
 *
 * @ORM\Table(name="provincias")
 * @ORM\Entity
 */
class Provincias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_provincia", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idProvincia;


    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=30)
     */
    private $provincia;


    /**
     * Set idProvincia
     *
     * @param integer $idProvincia
     *
     * @return provincias
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
     * Set provincia
     *
     * @param string $provincia
     *
     * @return provincias
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string
     */
    public function getProvincia()
    {
        return $this->provincia;
    }
}

