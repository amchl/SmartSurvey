<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 17/03/2017
 * Time: 14:47
 */


namespace projetQCM\formBundle\Controller;

use projetQCM\formBundle\Entity\Formulaire;
use projetQCM\formBundle\Entity\Questionnaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class ListFormController extends Controller
{
    public function showAction()
    {
        $formulaires = $this->getDoctrine()
            ->getRepository('formBundle:Formulaire')
            ->findAll();

        if (!$formulaires) {
            throw $this->createNotFoundException(
                'No formulaire'
            );
        }

        return $this->render('formBundle:Form:listeFormulaire.html.twig',array(
            'formulaires' => $formulaires));

    }
}