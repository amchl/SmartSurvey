<?php

namespace projetQCM\formBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="projetQCM\formBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="q", type="string", length=255)
     */
    private $q;

    /**
     * @ORM\ManyToOne(targetEntity="Formulaire", inversedBy="questions")
     * @ORM\JoinColumn(name="formulaire_id", referencedColumnName="id")
     */
    private $formulaire;



    /**
     * @ORM\OneToMany(targetEntity="Reponse", mappedBy="question")
     */
    private $reponses;

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
     * Set q
     *
     * @param string $q
     *
     * @return Question
     */
    public function setQ($q)
    {
        $this->q = $q;

        return $this;
    }

    /**
     * Get q
     *
     * @return string
     */
    public function getQ()
    {
        return $this->q;
    }

    public function __toString() {
        return $this->q;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set formulaire
     *
     * @param \projetQCM\formBundle\Entity\Formulaire $formulaire
     *
     * @return Question
     */
    public function setFormulaire(\projetQCM\formBundle\Entity\Formulaire $formulaire = null)
    {
        $this->formulaire = $formulaire;

        return $this;
    }

    /**
     * Get formulaire
     *
     * @return \projetQCM\formBundle\Entity\Formulaire
     */
    public function getFormulaire()
    {
        return $this->formulaire;
    }


    /**
     * Add reponse
     *
     * @param \projetQCM\formBundle\Entity\Reponse $reponse
     *
     * @return Question
     */
    public function addReponse(\projetQCM\formBundle\Entity\Reponse $reponse)
    {
        $this->reponses[] = $reponse;

        return $this;
    }

    /**
     * Remove reponse
     *
     * @param \projetQCM\formBundle\Entity\Reponse $reponse
     */
    public function removeReponse(\projetQCM\formBundle\Entity\Reponse $reponse)
    {
        $this->reponses->removeElement($reponse);
    }

    /**
     * Get reponses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponses()
    {
        return $this->reponses;
    }
}
