<?php

namespace Beubi\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate($workouts, $this->get('request')->query->get('page', 1),
            $this->container->getParameter('max_page_items'));

        return array(
            'workouts' => $pagination,
        );
    }
}
