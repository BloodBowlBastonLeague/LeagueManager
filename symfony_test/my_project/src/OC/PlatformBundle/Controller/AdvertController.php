<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
    public function indexAction($page)
    {
        /** /
        // On veut avoir l'URL de l'annonce d'id 5.
        $url = $this->get('router')->generate(
            'oc_platform_view', // 1er argument : le nom de la route
            array('id' => 5)    // 2e argument : les valeurs des paramètres
        );
        // $url vaut « /platform/advert/5 »

        return new Response("L'URL de l'annonce page ".$page." ;  d'id 5 est : ".$url);
        /**/

        // On ne sait pas combien de pages il y a
        // Mais on sait qu'une page doit être supérieure ou égale à 1
        if ($page < 1) {
          // On déclenche une exception NotFoundHttpException, cela va afficher
          // une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
          throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
        }

        // Ici, on récupérera la liste des annonces, puis on la passera au template

        // Mais pour l'instant, on ne fait qu'appeler le template
        return $this->render('OCPlatformBundle:Advert:index.html.twig');
    }

    public function viewAction($id, Request $request) {
        /** /
        /**/

        /** /
        $url = $this->get('router')->generate('oc_platform_home');
        return $this->redirect($url);
        /**/

        /** /
        // Créons nous-mêmes la réponse en JSON, grâce à la fonction json_encode()
        $response = new Response;
        // Ici, nous définissons le Content-type pour dire au navigateur
        // que l'on renvoie du JSON et non du HTML
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode(array('id' => $id)));
        return $response;
        /**/

        /** /
        return new JsonResponse(array('id' => $id));
        /**/

        /** /
        // Récupération de la session
        $session = $request->getSession();
        // On récupère le contenu de la variable user_id
        $userId = $session->get('user_id');
        // On définit une nouvelle valeur pour cette variable user_id
        $session->set('user_id', 91);
        // On n'oublie pas de renvoyer une réponse
        return new Response("Je suis une page de test, je n'ai rien à dire</body>");
        /**/



        return $this->render('OCPlatformBundle:Advert:view.html.twig',array('id'  => $id));
    }

    public function viewSlugAction($year,$slug,$_format) {  
        return new Response('Mon slug : '.$year.','.$slug.','.$_format);
    }

    public function addAction(Request $request) {
        // La gestion d'un formulaire est particulière, mais l'idée est la suivante :

        // Si la requête est en POST, c'est que le visiteur a soumis le formulaire
        if ($request->isMethod('POST')) {
          // Ici, on s'occupera de la création et de la gestion du formulaire

          $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

          // Puis on redirige vers la page de visualisation de cettte annonce
          return $this->redirect($this->generateUrl('oc_platform_view', array('id' => 5)));
        }

        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('OCPlatformBundle:Advert:add.html.twig');
    }
    public function editAction($id, Request $request) {
        // Ici, on récupérera l'annonce correspondante à $id

        // Même mécanisme que pour l'ajout
        if ($request->isMethod('POST')) {
          $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

          return $this->redirect($this->generateUrl('oc_platform_view', array('id' => 5)));
        }

        return $this->render('OCPlatformBundle:Advert:edit.html.twig');
      }

      public function deleteAction($id) {
        // Ici, on récupérera l'annonce correspondant à $id

        // Ici, on gérera la suppression de l'annonce en question

        return $this->render('OCPlatformBundle:Advert:delete.html.twig');
      }
}
