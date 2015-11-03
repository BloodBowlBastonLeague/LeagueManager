<?php

namespace BBBL\LeagueManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BBBL\LeagueManagerBundle\Entity\Membre;
use BBBL\LeagueManagerBundle\Form\MembreType;

/**
 * Membre controller.
 *
 */
class MembreController extends Controller
{

    /**
     * Lists all Membre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BBBLLeagueManagerBundle:Membre')->findAll();

        return $this->render('BBBLLeagueManagerBundle:Membre:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Membre entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Membre();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('membre_show', array('id' => $entity->getId())));
        }

        return $this->render('BBBLLeagueManagerBundle:Membre:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Membre entity.
     *
     * @param Membre $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Membre $entity)
    {
        $form = $this->createForm(new MembreType(), $entity, array(
            'action' => $this->generateUrl('membre_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Membre entity.
     *
     */
    public function newAction()
    {
        $entity = new Membre();
        $form   = $this->createCreateForm($entity);

        return $this->render('BBBLLeagueManagerBundle:Membre:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Membre entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BBBLLeagueManagerBundle:Membre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Membre entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BBBLLeagueManagerBundle:Membre:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Membre entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BBBLLeagueManagerBundle:Membre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Membre entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BBBLLeagueManagerBundle:Membre:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Membre entity.
    *
    * @param Membre $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Membre $entity)
    {
        $form = $this->createForm(new MembreType(), $entity, array(
            'action' => $this->generateUrl('membre_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Membre entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BBBLLeagueManagerBundle:Membre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Membre entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('membre_edit', array('id' => $id)));
        }

        return $this->render('BBBLLeagueManagerBundle:Membre:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Membre entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BBBLLeagueManagerBundle:Membre')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Membre entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('membre'));
    }

    /**
     * Creates a form to delete a Membre entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('membre_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
