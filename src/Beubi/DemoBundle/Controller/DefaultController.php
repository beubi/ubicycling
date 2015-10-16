<?php

namespace Beubi\DemoBundle\Controller;

use Beubi\DemoBundle\Form\WorkoutsSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template("BeubiDemoBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/contact", name="contacts")
     * @Template("BeubiDemoBundle:Default:contact.html.twig")
     */
    public function contactsAction()
    {

        return array();
    }

    /**
     * @Route("/about", name="about")
     * @Template("BeubiDemoBundle:Default:about.html.twig")
     */
    public function aboutAction()
    {
        
       return array();
    }

    /**
     * @Route("/sidebar/left", name="sidebar_left")
     * @Template("BeubiDemoBundle:Default:sidebar-left.html.twig")
     */
    public function sidebarLeftAction()
    {
        return array();
    }

    /**
     * @Route("/sidebar/right", name="sidebar_right")
     * @Template("BeubiDemoBundle:Default:sidebar-right.html.twig")
     */
    public function sidebarRightAction()
    {
        return array();
    }

    /**
     * @Route("/signin", name="signin")
     * @Template("BeubiDemoBundle:Default:signin.html.twig")
     */
    public function signinAction()
    {
        return array();
    }

    /**
     * @Route("/signup", name="signup")
     * @Template("BeubiDemoBundle:Default:signup.html.twig")
     */
    public function signupAction()
    {
        return array();
    }

    /**
     * @Route("/workouts", name="workouts")
     * @Template("BeubiDemoBundle:Default:workouts.html.twig")
     */
    public function workoutsAction()
    {
        $em = $this->getDoctrine();

        $workouts = $em->getRepository('BeubiDemoBundle:Workout')->findAll();

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
     * @Route("/workouts/search", name="workouts_search")
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
     * Creates a form to search processes
     *
     * @return \Symfony\Component\Form\Form
     */
    private function createSearchForm()
    {
        $form = $this->createForm(new WorkoutsSearchType(), null, array(
            'action' => $this->generateUrl('workouts_search'), 'method' => 'GET'));

        /*$form->add('search', 'submit', array('label' => 'form.buttons.search',
            'attr' => array('class' => 'btn-sm', 'icon' => 'search')));*/

        return $form;
    }
}
