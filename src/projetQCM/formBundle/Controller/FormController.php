<?php
/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 16/03/2017
 * Time: 16:02
 */

namespace projetQCM\formBundle\Controller;

use projetQCM\formBundle\Entity\Formulaire;
use projetQCM\formBundle\Entity\Question;
use projetQCM\formBundle\Form\FormulaireType;
use projetQCM\formBundle\Form\QuestionType;
use projetQCM\formBundle\Form\ReponseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
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
        $question = new Question();
        $form = $this->get('form.factory')->createBuilder(FormulaireType::class, $formulaire)
            ->add('title', TextType::class)
            ->add('q', QuestionType::class)
            ->add('r', ReponseType::class)
            ->add('button', ButtonType::class)

            ->add('envoyer', SubmitType::class)
            ->getForm();

        //$request = $this->get('request');
        /*if ($request->request->has('+'))
        {
            $form->add('r', ReponseType::class);
        }*/
        /*if ($form->isValid()) {
            if ($form->get('+')->isClicked()) {
                $form->add('r', ReponseType::class);
            }
        }        if ($form->get('+')->onClicked()) {
            $form->add('r', TextType::class);
        }*/

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $data = $form->getData();

             $em = $this->getDoctrine()->getManager();
             $em->persist($data);
             $em->flush();
            return $this->render('formBundle:Form:accueil.html.twig', array(
                'form' => $form->createView(),
            ));
        }
        return $this->render('formBundle:Form:qform.html.twig', array(
                'form' => $form->createView(),
            ));
    }
}