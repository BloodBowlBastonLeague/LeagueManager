<?php

namespace BBBL\LeagueManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        // die('pouet');
        return $this->render('BBBLLeagueManagerBundle:Default:index.html.twig');
    }

    // TEST


    public function test01Action() {
        // return $this->render('BBBLLeagueManagerBundle:Default:index.html.twig', array('name' => $name));
        require dirname(__FILE__).'/../../../../vendor/perso/Cdb.class.php';
        $query = "show databases";
        $res = \Cdb::get('main')->selectListTab($query);
        print_r($res);
        die('pouet');
    }
    
    public function test02Action($name)
    {
        return $this->render('BBBLLeagueManagerBundle:Default:name.html.twig', array('name' => $name));
    }
}
