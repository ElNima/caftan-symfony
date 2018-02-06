<?php

namespace CAFTAN\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Infosdivers
 *
 * @ORM\Table(name="infosdivers")
 * @ORM\Entity(repositoryClass="CAFTAN\AppBundle\Repository\InfosdiversRepository")
 */
class Infosdivers
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
     * @ORM\Column(name="fblink", type="string", length=255)
     */
    private $fblink;
    
//    /**
//     * @ORM\OneToMany(targetEntity="CAFTAN\AppBundle\Entity\Image", cascade={"persist", "remove"}, inversedBy="Infosdivers")
//     * @ORM\JoinColumn(nullable=false)
//     */
//    private $images;
//    
//    function getImages() {
//        return $this->images;
//    }
//
//    function setImages($images) {
//        $this->images = $images;
//    }

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
     * Set fblink
     *
     * @param string $fblink
     *
     * @return Infosdivers
     */
    public function setFblink($fblink)
    {
        $this->fblink = $fblink;

        return $this;
    }

    /**
     * Get fblink
     *
     * @return string
     */
    public function getFblink()
    {
        return $this->fblink;
    }
}
