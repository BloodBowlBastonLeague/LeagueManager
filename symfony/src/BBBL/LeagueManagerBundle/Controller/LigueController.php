<?php

namespace BBBL\LeagueManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use BBBL\LeagueManagerBundle\Entity\Ligue;
use BBBL\LeagueManagerBundle\Form\LigueType;

/**
 * Ligue controller.
 *
 */
class LigueController extends Controller
{

    /**
     * Lists all Ligue entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BBBLLeagueManagerBundle:Ligue')->findAll();

        return $this->render('BBBLLeagueManagerBundle:Ligue:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Ligue entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Ligue();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ligue_show', array('id' => $entity->getId())));
        }

        return $this->render('BBBLLeagueManagerBundle:Ligue:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Ligue entity.
     *
     * @param Ligue $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Ligue $entity)
    {
        $form = $this->createForm(new LigueType(), $entity, array(
            'action' => $this->generateUrl('ligue_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ligue entity.
     *
     */
    public function newAction()
    {
        $entity = new Ligue();
        $form   = $this->createCreateForm($entity);

        return $this->render('BBBLLeagueManagerBundle:Ligue:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ligue entity.
     *
     */
    public function showAction($id,$_format)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BBBLLeagueManagerBundle:Ligue')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ligue entity.');
        }
        if ('twig' == $_format) {
            $deleteForm = $this->createDeleteForm($id);

            return $this->render('BBBLLeagueManagerBundle:Ligue:show.html.twig', array(
                'entity'      => $entity,
                'delete_form' => $deleteForm->createView(),
            ));
         }

        $serializer = $this->container->get('serializer');
        $reports = $serializer->serialize($entity, $_format);
        return new Response($reports);
    }

    /**
     * Displays a form to edit an existing Ligue entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BBBLLeagueManagerBundle:Ligue')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ligue entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BBBLLeagueManagerBundle:Ligue:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Ligue entity.
    *
    * @param Ligue $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ligue $entity)
    {
        $form = $this->createForm(new LigueType(), $entity, array(
            'action' => $this->generateUrl('ligue_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ligue entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BBBLLeagueManagerBundle:Ligue')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ligue entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ligue_edit', array('id' => $id)));
        }

        return $this->render('BBBLLeagueManagerBundle:Ligue:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Ligue entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BBBLLeagueManagerBundle:Ligue')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ligue entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ligue'));
    }

    /**
     * Creates a form to delete a Ligue entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ligue_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
