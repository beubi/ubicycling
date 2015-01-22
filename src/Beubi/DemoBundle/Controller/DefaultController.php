<?php

namespace Beubi\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template()
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
     * @Route("/demo-form", name="demo_form")
     * @Template("BeubiDemoBundle:Default:demo-form.html.twig")
     */
    public function demoFormAction()
    {
        $table_contents = array();

        for ($i=0; $i < 100; $i++) {
            $item = array('id' => $i+1, 'description' => 'A, quibusdam, nobis, eveniet consequatur alias doloremque
            officia blanditiis fuga et numquam labore reiciendis voluptas quis repellat quos sunt non dolore consectetur at sit nam tenetur dolorem',
            'name' => 'Quibusdam');

            array_push($table_contents, $item);
        }

        return array('table' => $table_contents);
    }
}
