<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 16/03/2017
 * Time: 16:02
 */

namespace projetQCM\formBundle\Controller;

use projetQCM\formBundle\Entity\Formulaire;
use projetQCM\formBundle\Entity\Questionnaire;
use projetQCM\formBundle\Form\FormulaireType;
use projetQCM\formBundle\Form\QuestionnaireType;
use projetQCM\formBundle\Form\ReponseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class FormController extends Controller
{
    public function indexAction()
    {
        return $this->render('formBundle:Form:qform.html.twig');
    }

    public function formAction(Request $request)
    {
        $formulaire = new Formulaire();
        $form = $this->get('form.factory')->createBuilder(FormulaireType::class, $formulaire)
            ->add('titre', TextType::class)
            ->add('questionnaires', QuestionnaireType::class)
            ->add('reponses', ReponseType::class)
            ->add('envoyer', SubmitType::class)
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $data = $form->getData();

             $em = $this->getDoctrine()->getManager();
             $em->persist($data);
             $em->flush();
        }
        return $this->render('formBundle:Form:qform.html.twig', array(
                'form' => $form->createView(),
            ));
    }
}