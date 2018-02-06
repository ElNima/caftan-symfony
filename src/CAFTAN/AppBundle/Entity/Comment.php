<?php

namespace CAFTAN\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="CAFTAN\AppBundle\Repository\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="comment", type="text")
     * @Assert\NotBlank()
     */
    private $comment;
     /**
     * @ORM\ManyToOne(targetEntity="CAFTAN\AppBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $commenter;
     /**
     * @ORM\ManyToOne(targetEntity="CAFTAN\AppBundle\Entity\Annonce", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $annonce;
    
    /**
     * @ORM\ManyToOne(targetEntity="CAFTAN\AppBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */
    private $createur;
    
     /**
     * @var \DateTime
     *
     * @ORM\Column(name="date",nullable=true, type="datetime")
     * @Assert\DateTime()
     */
    private $date;
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set commenter
     *
     * @param \CAFTAN\AppBundle\Entity\User $commenter
     *
     * @return Comment
     */
    public function setCommenter(\CAFTAN\AppBundle\Entity\User $commenter)
    {
        $this->commenter = $commenter;

        return $this;
    }

    /**
     * Get commenter
     *
     * @return \CAFTAN\AppBundle\Entity\User
     */
    public function getCommenter()
    {
        return $this->commenter;
    }

    /**
     * Set annonce
     *
     * @param \CAFTAN\AppBundle\Entity\Annonce $annonce
     *
     * @return Comment
     */
    public function setAnnonce(\CAFTAN\AppBundle\Entity\Annonce $annonce)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return \CAFTAN\AppBundle\Entity\Annonce
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set createur
     *
     * @param \CAFTAN\AppBundle\Entity\User $createur
     *
     * @return Comment
     */
    public function setCreateur(\CAFTAN\AppBundle\Entity\User $createur)
    {
        $this->createur = $createur;

        return $this;
    }

    /**
     * Get createur
     *
     * @return \CAFTAN\AppBundle\Entity\User
     */
    public function getCreateur()
    {
        return $this->createur;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
    function __construct() {
       $this->createdAt = new \Datetime();
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
