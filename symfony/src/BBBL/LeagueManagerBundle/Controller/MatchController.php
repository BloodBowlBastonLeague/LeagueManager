<?php

namespace BBBL\LeagueManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use BBBL\LeagueManagerBundle\BB2XMLMatchReport;

class MatchController extends Controller
{
    public function indexAction($id)
    {
        return $this->showAction($id);
    }
    public function showAction($id = null,$format = null,$filename = null)
    {
        $replay = self::getReplayManager($filename);
        return $this->render('BBBLLeagueManagerBundle:Match:show.html.twig', array('id' => $id,'filename'=>$filename,'replay'=>$replay));
    }
    public function uploadAction() {
        return $this->render('BBBLLeagueManagerBundle:Match:upload.html.twig');
    }
    public function saveAction() {
        $bbrz = new BB2XMLMatchReport;
        $formBuilderBbrz = $this->createFormBuilder($bbrz);
        $form = $formBuilderBbrz->getForm();
        $request = $this->get('request');
        $form->handleRequest($request);

        print '<br/>-------------------------------------<br/>';
        print_r($_FILES);
        print '<br/>-------------------------------------<br/>';
        print_r($form);
        print '<br/>-------------------------------------<br/>';
        die();

        $replay = self::getReplayManager($filename);
        print '<h2>Home Team</h2>';
        print 'Id:'.$replay->getHomeTeamId().',';
        print 'Name:'.$replay->getHomeTeamName().',';
        print 'IdCoach:'.$replay->getHomeIdCoach().',';

        print '<h2>Home Team Stats</h2>';
        print '<h2>Home Team Players</h2>';

        print '<h2>Away Team</h2>';
        print 'Id:'.$replay->getAwayTeamId().',';
        print 'Name:'.$replay->getAwayTeamName().',';
        print 'IdCoach:'.$replay->getAwayIdCoach().',';

        print '<h2>Away Team Stats</h2>';
        print '<h2>Away Team Players</h2>';

        die();
    }

    private static function getReplayManager($_filename) {
        $uploaddir = './tmp/';
        $path = $uploaddir.$_filename.'.bbrz';
        
        if (!is_null($_filename)) {
            if (file_exists($path)) {
                $replay = new BB2XMLMatchReport($path);
                return $replay;
            } else {
                throw new \Exception($path." not exists");
            }
        }
    }
}
