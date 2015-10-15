<?php

namespace Beubi\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Beubi\DemoBundle\Entity\Workout;

/**
 * Load Workouts
 *
 * @package    DemoBundle
 * @subpackage DataFixtures
 * @author     Ubiprism Lda. / be.ubi <contact@beubi.com>
 */
class LoadWorkoutData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Adds Groups
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $em Entity Manager
     *
     * @return void
     */
    public function load(ObjectManager $em)
    {
        $workouts = $this->createWorkouts();

        foreach ($workouts as $workout) {
            $em->persist($this->createWorkoutFromArray($workout));
        }

        $em->flush();
    }

    /**
     * Converts an array with the information into the entity
     *
     * @param $item
     *
     * @return Workout
     */
    protected function createWorkoutFromArray($item) {

        if (!is_null($item)) {
            $wk = new Workout();
            $wk->setTitle($item['title']);
            $wk->setDistance($item['distance']);
            $wk->setDescription($item['description']);
            $wk->setTimestamp(\DateTime::createFromFormat('d/m/Y H:i', $item['timestamp']));
            $wk->setDuration($item['duration']);
            $wk->setCalories($item['calories']);

            return $wk;
        }
        return null;
    }

    /**
     * Create Workouts
     *
     * @return array()
     */
    protected function createWorkouts()
    {
        $table_contents = array();

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 53,
            'timestamp' => '27/01/2015 08:00',
            'duration' => '1:51:00',
            'calories' => 1101,
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Endurance Ride',
            'distance' => 112,
            'timestamp' => '28/01/2015 09:00',
            'duration' => '3:51:00',
            'calories' => 2754,
            'description' => 'Endurance workout with some climbing and some short sprints.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Force Workout',
            'distance' => 63,
            'timestamp' => '29/01/2015 09:30',
            'duration' => '2:11:00',
            'calories' => 1513,
            'description' => 'Cadence variations workout, with 3x7´at (L3 60 rpm + L3/4 > 90rpm)');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 45,
            'timestamp' => '30/01/2015 09:00',
            'duration' => '1:31:00',
            'calories' => 754,
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'VO2max',
            'distance' => 53,
            'timestamp' => '31/01/2015 09:30',
            'duration' => '1:59:00',
            'calories' => 1413,
            'description' => 'VO2max intervals - 3x3´at 390W with 3´ rec.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 50,
            'timestamp' => '01/02/2015 09:00',
            'duration' => '1:51:00',
            'calories' => 1103,
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Track Testing',
            'distance' => 43,
            'timestamp' => '02/02/2015 19:00',
            'duration' => '1:03:12',
            'calories' => 745,
            'description' => 'Fartlek type workout in the velodrome.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Muscular Endurance',
            'distance' => 53,
            'timestamp' => '03/02/2015 09:00',
            'duration' => '2:51:00',
            'calories' => 2109,
            'description' => '1h L1 + 2x20´ AT4 with 10´rec. + remaining at L2.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 45,
            'timestamp' => '04/02/2015 09:00',
            'duration' => '1:31:00',
            'calories' => 726,
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Endurance Ride',
            'distance' => 142,
            'timestamp' => '05/02/2015 09:00',
            'duration' => '5:01:00',
            'calories' => 2997,
            'description' => 'Endurance ride in the L2/L3 zones and some L4 in the climbs.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 57,
            'timestamp' => '06/02/2015 09:00',
            'duration' => '1:51:00',
            'calories' => 981,
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Track Testing',
            'distance' => 43,
            'timestamp' => '07/02/2015 19:00',
            'duration' => '1:01:42',
            'calories' => 810,
            'description' => 'Fartlek type workout in the velodrome.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Muscular Endurance',
            'distance' => 93,
            'timestamp' => '08/02/2015 09:00',
            'duration' => '3:00:10',
            'calories' => 1919,
            'description' => '1h L1 + 2x30´ AT4 with 10´rec. + remaining at L2.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Easy Workout',
            'distance' => 40,
            'timestamp' => '09/02/2015 09:00',
            'duration' => '1:31:00',
            'calories' => 701,
            'description' => 'Easy recovery ride.');
        array_push($table_contents, $item);

        $item = array(
            'title' => 'Endurance Ride',
            'distance' => 152,
            'timestamp' => '10/02/2015 09:00',
            'duration' => '5:21:00',
            'calories' => 3219,
            'description' => 'Endurance ride in the L2/L3 zones and some L4 in the climbs.');
        array_push($table_contents, $item);

        $table_contents = array_reverse($table_contents);

        return $table_contents;
    }


    /**
     * This represents the order in which fixtures will be loaded
     *
     * @return integer
     */
    public function getOrder()
    {
        return 0;
    }
}
