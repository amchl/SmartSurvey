<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 16/03/2017
 * Time: 16:02
 */

namespace projetQCM\formBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormController extends Controller
{
    public function indexAction()
    {
        return $this->render('formBundle:Form:form.html.twig');
    }

    public function formAction()
    {
        $question = new Question();
        $formBuilder = $this->get('form.Factory')->createBuilder(FormType::class, $question);

        $formBuilder
            ->add('question', TextType::class)
            ->add('submit', SubmitType::class );

        $form = $formBuilder->getForm();

        return $this->render('formBundle:Form:qForm.html.twig', array(
            'form'=>$form->createView()
        ));
    }
}