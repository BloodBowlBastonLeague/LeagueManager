<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
    public function indexAction()
    {
        $content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig',array('name'=>'Maremick'));
        return new Response($content);
    }

    public function viewAction($id) {  
        return new Response('Mon id : '.$id);
    }
    public function viewSlugAction($year,$slug,$format) {  
        return new Response('Mon slug : '.$year.','.$slug.','.$format);
    }

    public function addAcion() {

    }
}
