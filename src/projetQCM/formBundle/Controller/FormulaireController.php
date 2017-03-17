<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 16/03/2017
 * Time: 14:47
 */

namespace FormBundle\Controller;

use projetQCM\formBundle\Entity\Questionnaire;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FormulaireController extends controller
{
    /**
     * @Route("/lucky/number")
     */
    public function createFormulaire(Request $request)
    {
    $questionnaire= new Questionnaire();

        $form = $this->createFormBuilder($questionnaire)
            ->add('lastname', TextType::class)
            ->add('firstname', TextType::class)
            ->add('mail', EmailType::class)
            ->add('telephone', TextType::class)
            ->add('datenaissance', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            return $this->render('Validation.html.twig',array(
                'form' => $form->createView()));
        }



        return $this->render('formulaire.html.twig', array(
            'form' => $form->createView(),
        ));


    }




}