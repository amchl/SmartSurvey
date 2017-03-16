<?php

namespace projetQCM\formBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('formBundle:Default:index.html.twig');
    }
}
