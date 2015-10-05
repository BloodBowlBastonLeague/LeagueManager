<?php

namespace BBBL\LeagueManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BBBL\LeagueManagerBundle\BB2XMLMatchReport;

class MatchController extends Controller
{
    public function indexAction($id)
    {
        return $this->showAction($id);
    }
    public function showAction($id = null,$format = null,$filename = null)
    {
        $uploaddir = './tmp/';
        
        if (!is_null($filename)) {
            $a['filename'] = $filename.'.'.$format;
            $a['path'] = $uploaddir.$filename.'.'.$format;
            if (file_exists($uploaddir.$filename.'.'.$format)) {
                $replay = new BB2XMLMatchReport($a['path']);
            } else {
                throw new \Exception($uploaddir.$filename.'.'.$format." not exists");
            }
        }
        return $this->render('BBBLLeagueManagerBundle:Match:show.html.twig', array('id' => $id,'a'=>$a,'filename'=>$filename,'replay'=>$replay));
    }
}
