<?php

namespace BBBL\LeagueManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BBBLLeagueManagerBundle:Default:index.html.twig', array('name' => $name));
    }
}
