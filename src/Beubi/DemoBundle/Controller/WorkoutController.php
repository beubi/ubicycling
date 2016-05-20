<?php

namespace Beubi\DemoBundle\Controller;

use Beubi\DemoBundle\Form\WorkoutsSearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Beubi\DemoBundle\Entity\Workout;
use Beubi\DemoBundle\Form\WorkoutType;

/**
 * Workout controller.
 *
 * @Route("/workout")
 */
class WorkoutController extends Controller
{
    /**
     * @Route("/", name="workouts")
     * @Template("BeubiDemoBundle:Default:workouts.html.twig")
     */
    public function workoutsAction()
    {
        $em = $this->getDoctrine();

        $workouts = $em->getRepository('BeubiDemoBundle:Workout')->findBy(array(), array('timestamp' => 'DESC'));

        $form = $this->createSearchForm();

        return array(
            'form' => $form->createView(),
            'workouts' => $workouts,
        );
    }


    /**
     * Search action
     *
     * @param \Symfony\Component\HttpFoundation\Request $request request object
     *
     * @Route("/search", name="workouts_search")
     * @Method("GET")
     * @Template("BeubiDemoBundle:Default:workouts.html.twig")
     *
     * @return Array request information needed for generating an output representation to the user
     */
    public function workoutsSearchAction(Request $request)
    {
        $form = $this->createSearchForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $filters = $form->getData();

            $queryTxt = $filters['query'];

            $em = $this->getDoctrine();

            $query_results = $em->getRepository('BeubiDemoBundle:Workout')->findWorkouts($queryTxt);

            return array(
                'form' => $form->createView(),
                'workouts' => $query_results,
            );
        }
        return array(
            'form' => $form->createView(),
            'workouts' => array(),
        );

    }

    /**
     * Creates a new Workout entity.
     *
     * @Route("/create", name="workout_create")
     * @Method("POST")
     * @Template("BeubiDemoBundle:Workout:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Workout();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setTimestamp(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('workouts'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Workout entity.
     *
     * @param Workout $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Workout $entity)
    {
        $form = $this->createForm(new WorkoutType(), $entity, array(
            'action' => $this->generateUrl('workout_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Workout entity.
     *
     * @Route("/new", name="workout_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Workout();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Workout entity.
     *
     * @Route("/{id}", name="workout_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeubiDemoBundle:Workout')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Workout entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Workout entity.
     *
     * @Route("/{id}/edit", name="workout_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeubiDemoBundle:Workout')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Workout entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Workout entity.
    *
    * @param Workout $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Workout $entity)
    {
        $form = $this->createForm(new WorkoutType(), $entity, array(
            'action' => $this->generateUrl('workout_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Workout entity.
     *
     * @Route("/{id}", name="workout_update")
     * @Method("PUT")
     * @Template("BeubiDemoBundle:Workout:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BeubiDemoBundle:Workout')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Workout entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('workout_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Workout entity.
     *
     * @Route("/{id}", name="workout_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BeubiDemoBundle:Workout')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Workout entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('workouts'));
    }

    /**
     * Creates a form to delete a Workout entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('workout_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Creates a form to search processes
     *
     * @return \Symfony\Component\Form\Form
     */
    private function createSearchForm()
    {
        $form = $this->createForm(new WorkoutsSearchType(), null, array(
            'action' => $this->generateUrl('workouts_search'), 'method' => 'GET'));

        return $form;
    }
}
