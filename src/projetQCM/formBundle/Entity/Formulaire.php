<?php

namespace projetQCM\formBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Formulaire
 *
 * @ORM\Table(name="formulaire")
 * @ORM\Entity(repositoryClass="projetQCM\formBundle\Repository\FormulaireRepository")
 */
class Formulaire
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;


    /**
     * @ORM\OneToMany(targetEntity="Questionnaire", mappedBy="formulaire")
     */
    private $questionnaires;


    /**
     * @ORM\OneToMany(targetEntity="Reponse", mappedBy="formulaire")
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Formulaire
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Add questionnaire
     *
     * @param \projetQCM\formBundle\Entity\Questionnaire $questionnaire
     *
     * @return Formulaire
     */
    public function addQuestionnaire(\projetQCM\formBundle\Entity\Questionnaire $questionnaire)
    {
        $this->questionnaires[] = $questionnaire;

        return $this;
    }

    /**
     * Remove questionnaire
     *
     * @param \projetQCM\formBundle\Entity\Questionnaire $questionnaire
     */
    public function removeQuestionnaire(\projetQCM\formBundle\Entity\Questionnaire $questionnaire)
    {
        $this->questionnaires->removeElement($questionnaire);
    }

    /**
     * Get questionnaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionnaires()
    {
        return $this->questionnaires;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questionnaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reponses = new \projetQCM\formBundle\Entity\Reponse();
    }

    /**
     * Add reponse
     *
     * @param \projetQCM\formBundle\Entity\Reponse $reponse
     *
     * @return Formulaire
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
