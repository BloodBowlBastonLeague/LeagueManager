<?php

namespace BBBL\LeagueManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MatchController extends Controller
{
    public function indexAction($id)
    {
        return $this->showAction($id);
    }
    public function showAction($id,$format = null)
    {
        if (is_null($format)) {
            $a = array('id' => $id,'pif','paf','pouff','melon');
        } else {
            $a = array('id' => $id,'pif','paf','pouff','pastèque');
        }
        return $this->render('BBBLLeagueManagerBundle:Match:show.html.twig', array('id' => $id,'a'=>$a));
    }
}
