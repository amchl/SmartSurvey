<?php

namespace projetQCM\formBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity(repositoryClass="projetQCM\formBundle\Repository\ReponseRepository")
 */
class Reponse
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
     * @ORM\Column(name="r", type="string", length=255)
     */
    protected $r;

    /**
     * @var bool
     *
     * @ORM\Column(name="valid", type="boolean")
     */
    protected $valid;


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
     * Set r
     *
     * @param string $r
     *
     * @return Reponse
     */
    public function setR($r)
    {
        $this->r = $r;

        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="reponses")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
     private  $question;






    /**
     * Get r
     *
     * @return string
     */
    public function getR()
    {
        return $this->r;
    }

    /**
     * Set valid
     *
     * @param boolean $valid
     *
     * @return Reponse
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return bool
     */
    public function getValid()
    {
        return $this->valid;
    }

    public function __toString() {
        return $this->r;
    }

    /**
     * Set question
     *
     * @param \projetQCM\formBundle\Entity\Question $question
     *
     * @return Reponse
     */
    public function setQuestion(\projetQCM\formBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \projetQCM\formBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
