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

    public function validAction(Request $request, $id)
    {

        $form = $this->createForm(new RoleType() );

        $form->handleRequest($request);

        if ($form->isValid() )
        {

            $data = $form->getData();

            //Get role chosen from form data (key is fieldname) and choose appropriate method to make change
            switch($data['role'] ){
             case "moderateur":
                 $this->donneModerateur($id);
                 break;
             case "actif":
                 $this->donneActif($id);
                 break;
             //etc etc
    }
    }


}