<?php

namespace CAFTAN\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="CAFTAN\AppBundle\Repository\AnnonceRepository")
 */
class Annonce
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
     * @ORM\Column(name="neuf", type="boolean")
     * @Assert\Type(type="bool")
     */
    private $neuf=false;
    /**
     * @var string
     *
     * @ORM\Column(name="signaled", type="boolean")
     * @Assert\Type(type="bool")
     */
    private $signaled=false;

    /**
     * @var string
     *
     * @ORM\Column(name="published", type="boolean")
     * @Assert\Type(type="bool")
     */
    private $published=false;
    
    /**

    * @ORM\Column(name="createdAt", type="datetime")
    *

    */

  private $createdAt;
  
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\Type(type="string")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=255)
     * 
     */
    private $prix;
    
   /**
     * @var string
     *
     * @ORM\Column(name="creation", type="string", length=255)
     * @Assert\Type(type="string")
     */
    private $creation;
    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="text")
     * @Assert\Length(min=10)
     */
    private $descr;
    
    /**
     * @ORM\ManyToOne(targetEntity="CAFTAN\AppBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $image;
    /**
     * @ORM\ManyToOne(targetEntity="CAFTAN\AppBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $annonceur;
    
    function __construct() {
        $this->createdAt = new \Datetime();
    }
    
    function getNeuf() {
        return $this->neuf;
    }

    function getSignaled() {
        return $this->signaled;
    }

    function getPublished() {
        return $this->published;
    }

    function getCreatedAt() {
        return $this->createdAt;
    }

    function getTitle() {
        return $this->title;
    }

    function getPrix() {
        return $this->prix;
    }

    function getCreation() {
        return $this->creation;
    }

    function getDescr() {
        return $this->descr;
    }

    function getImage() {
        return $this->image;
    }

    function getAnnonceur() {
        return $this->annonceur;
    }

    function setNeuf($neuf) {
        $this->neuf = $neuf;
    }

    function setSignaled($signaled) {
        $this->signaled = $signaled;
    }

    function setPublished($published) {
        $this->published = $published;
    }

    function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    function setCreation($creation) {
        $this->creation = $creation;
    }

    function setDescr($descr) {
        $this->descr = $descr;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setAnnonceur($annonceur) {
        $this->annonceur = $annonceur;
    }

            /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

}
