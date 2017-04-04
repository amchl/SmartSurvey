<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 02/04/2017
 * Time: 18:11
 */

namespace projetQCM\formBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReponseFormController extends Controller
{

    public function reponseShowAction($idForm)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $em->getRepository('formBundle:Formulaire')->find($idForm);

        if (!$form) {
            throw $this->createNotFoundException(
                'No product found for id '.$idForm
            );
        }

        return $this->render('formBundle:Form:ReponseFormulaire.html.twig',array(
            'formulaire' => $form));

    }



}