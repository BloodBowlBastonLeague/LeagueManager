<?php

namespace BBBL\LeagueManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use BBBL\LeagueManagerBundle\Entity\Matchs;
use BBBL\LeagueManagerBundle\Form\MatchsType;

/**
 * Matchs controller.
 *
 */
class MatchsController extends Controller
{

    /**
     * Lists all Matchs entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BBBLLeagueManagerBundle:Matchs')->findAll();

        return $this->render('BBBLLeagueManagerBundle:Matchs:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Matchs entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Matchs();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('matchs_show', array('id' => $entity->getId())));
        }

        return $this->render('BBBLLeagueManagerBundle:Matchs:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Matchs entity.
     *
     * @param Matchs $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Matchs $entity)
    {
        $form = $this->createForm(new MatchsType(), $entity, array(
            'action' => $this->generateUrl('matchs_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Matchs entity.
     *
     */
    public function newAction()
    {
        $entity = new Matchs();
        $form   = $this->createCreateForm($entity);

        return $this->render('BBBLLeagueManagerBundle:Matchs:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Matchs entity.
     *
     */
    public function showAction($id,$_format)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BBBLLeagueManagerBundle:Matchs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Matchs entity.');
        }
        if ('twig' == $_format) {
            $deleteForm = $this->createDeleteForm($id);

            return $this->render('BBBLLeagueManagerBundle:Matchs:show.html.twig', array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
            ));
         }

        $serializer = $this->container->get('serializer');
        $reports = $serializer->serialize($entity, $_format);
        return new Response($reports);
    }

    /**
     * Displays a form to edit an existing Matchs entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BBBLLeagueManagerBundle:Matchs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Matchs entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BBBLLeagueManagerBundle:Matchs:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Matchs entity.
    *
    * @param Matchs $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Matchs $entity)
    {
        $form = $this->createForm(new MatchsType(), $entity, array(
            'action' => $this->generateUrl('matchs_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Matchs entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BBBLLeagueManagerBundle:Matchs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Matchs entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('matchs_edit', array('id' => $id)));
        }

        return $this->render('BBBLLeagueManagerBundle:Matchs:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Matchs entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BBBLLeagueManagerBundle:Matchs')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Matchs entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('matchs'));
    }

    /**
     * Creates a form to delete a Matchs entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('matchs_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
