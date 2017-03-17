<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 16/03/2017
 * Time: 16:02
 */

namespace projetQCM\formBundle\Controller;

use projetQCM\formBundle\Entity\Questionnaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FormController extends Controller
{
    public function indexAction()
    {
        return $this->render('formBundle:Form:form.html.twig');
    }

    public function formAction()
    {
        $question = new Questionnaire();
        $formBuilder = $this->get('form.Factory')->createBuilder(FormType::class, $question);

        $formBuilder
            ->add('titre', TextType::class)
            ->add('reponses', CheckboxType::class)
            ->add('submit', SubmitType::class);

        $form = $formBuilder->getForm();

        return $this->render('formBundle:Form:qForm.html.twig', array(
            'form'=>$form->createView()
        ));
    }
}