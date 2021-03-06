<?php

namespace CAFTAN\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * User
 *
 * @ORM\Table(name="usere")
 * @ORM\Entity(repositoryClass="CAFTAN\AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
   
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", nullable=true, length=255)
     * @Assert\Type(type="string")
     */
    private $nom;
     /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", nullable=true, length=255)
     *
     * 
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", nullable=true, length=255)
     */
    private $prenom;
//@Assert\Regex(    pattern=pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$",
   

    /**
     * @var bool
     *
     * @ORM\Column(name="createur", type="boolean")
     */
    private $createur=false;

    /**
     * @var string
     *
     * @ORM\Column(name="parcour",nullable=true, type="text")
     */
    
    private $parcour;
    

 /**
     * @ORM\ManyToOne(targetEntity="CAFTAN\AppBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $image;
     /**
     * @ORM\ManyToOne(targetEntity="CAFTAN\AppBundle\Entity\Adress", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $adress;
    function getImage() {
        return $this->image;
    }

    function getAdress() {
        return $this->adress;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setAdress($adress) {
        $this->adress = $adress;
    }

    
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
     * Set nom.
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set genre.
     *
     * @param string $genre
     *
     * @return User
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre.
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set createur.
     *
     * @param bool $createur
     *
     * @return User
     */
    public function setCreateur($createur)
    {
        $this->createur = $createur;

        return $this;
    }

    /**
     * Get createur.
     *
     * @return bool
     */
    public function getCreateur()
    {
        return $this->createur;
    }

    /**
     * Set parcour.
     *
     * @param string $parcour
     *
     * @return User
     */
    public function setParcour($parcour)
    {
        $this->parcour = $parcour;

        return $this;
    }

    /**
     * Get parcour.
     *
     * @return string
     */
    public function getParcour()
    {
        return $this->parcour;
    }



    /**
     * Set tel.
     *
     * @param string|null $tel
     *
     * @return User
     */
    public function setTel($tel = null)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel.
     *
     * @return string|null
     */
    public function getTel()
    {
        return $this->tel;
    }
}
