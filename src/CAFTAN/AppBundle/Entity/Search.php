<?php

namespace CAFTAN\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Search
 *
 * @ORM\Table(name="search")
 * @ORM\Entity(repositoryClass="CAFTAN\AppBundle\Repository\SearchRepository")
 */
class Search
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
     * @ORM\Column(name="cp", type="string", length=255)
     */
    private $cp;

    /**
     * @var float
     *
     * @ORM\Column(name="prixmin", type="float")
     */
    private $prixmin;
     /**
     * @var float
     *
     * @ORM\Column(name="prixmax", type="float")
     */
    private $prixmax;

    /**
     * @var bool
     *
     * @ORM\Column(name="neuf", type="boolean")
     */
    private $neuf;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cp.
     *
     * @param string $cp
     *
     * @return Search
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp.
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    function getPrixmin() {
        return $this->prixmin;
    }

    function getPrixmax() {
        return $this->prixmax;
    }

    function setPrixmin($prixmin) {
        $this->prixmin = $prixmin;
    }

    function setPrixmax($prixmax) {
        $this->prixmax = $prixmax;
    }

    
    /**
     * Set neuf.
     *
     * @param bool $neuf
     *
     * @return Search
     */
    public function setNeuf($neuf)
    {
        $this->neuf = $neuf;

        return $this;
    }

    /**
     * Get neuf.
     *
     * @return bool
     */
    public function getNeuf()
    {
        return $this->neuf;
    }
}
