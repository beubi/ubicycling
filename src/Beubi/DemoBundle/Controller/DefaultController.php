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
        return $this->redirect($this->generateUrl('workouts', array()));
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
        $table_contents = array();

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 53,
            'date' => '27/01/2015 08:00',
            'duration' => '1:51:00',
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Endurance Ride',
            'distance' => 112,
            'date' => '28/01/2015 09:00',
            'duration' => '3:51:00',
            'description' => 'Endurance workout with some climbing and some short sprints.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Force Workout',
            'distance' => 63,
            'date' => '29/01/2015 09:30',
            'duration' => '2:11:00',
            'description' => 'Cadence variations workout, with 3x7´at (L3 60 rpm + L3/4 > 90rpm)');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 45,
            'date' => '30/01/2015 09:00',
            'duration' => '1:31:00',
            'description' => 'Easy recovery ride.');
        
        array_push($table_contents, $item);

        $item = array(
            'title' => 'VO2max',
            'distance' => 53,
            'date' => '31/01/2015 09:30',
            'duration' => '1:59:00',
            'description' => 'VO2max intervals - 3x3´at 390W with 3´ rec.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 50,
            'date' => '01/02/2015 09:00',
            'duration' => '1:51:00',
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Track Testing',
            'distance' => 43,
            'date' => '02/02/2015 19:00',
            'duration' => '1:03:12',
            'description' => 'Fartlek type workout in the velodrome.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Muscular Endurance',
            'distance' => 53,
            'date' => '03/02/2015 09:00',
            'duration' => '2:51:00',
            'description' => '1h L1 + 2x20´ AT4 with 10´rec. + remaining at L2.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 45,
            'date' => '04/02/2015 09:00',
            'duration' => '1:31:00',
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Endurance Ride',
            'distance' => 142,
            'date' => '05/02/2015 09:00',
            'duration' => '5:01:00',
            'description' => 'Endurance ride in the L2/L3 zones and some L4 in the climbs.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 57,
            'date' => '06/02/2015 09:00',
            'duration' => '1:51:00',
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Track Testing',
            'distance' => 43,
            'date' => '07/02/2015 19:00',
            'duration' => '1:01:42',
            'description' => 'Fartlek type workout in the velodrome.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Muscular Endurance',
            'distance' => 93,
            'date' => '08/02/2015 09:00',
            'duration' => '3:00:10',
            'description' => '1h L1 + 2x30´ AT4 with 10´rec. + remaining at L2.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 40,
            'date' => '09/02/2015 09:00',
            'duration' => '1:31:00',
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Endurance Ride',
            'distance' => 152,
            'date' => '10/02/2015 09:00',
            'duration' => '5:21:00',
            'description' => 'Endurance ride in the L2/L3 zones and some L4 in the climbs.');
        array_push($table_contents, $item);

        return array('table' => array_reverse($table_contents));
    }
}
