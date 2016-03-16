<?php

namespace Beubi\DemoBundle\Repository;
use Doctrine\ORM\EntityRepository;

/**
 * WorkoutRepository Repository
 *
 * @package    DemoBundle
 * @subpackage Repository
 * @author     Ubiprism Lda. / be.ubi <contact@beubi.com>
 */
class WorkoutsRepository extends EntityRepository
{
    /**
     * Searches Workouts
     *
     * @param string $text text to search
     *
     * @return array
     */
    public function findWorkouts($text)
    {
        $search_str = '%'.strtolower($text).'%';
        $query = $this->createQueryBuilder('w')
            ->orWhere('lower(w.description) LIKE :text')
            ->orWhere('lower(w.title) LIKE :text')
            ->orderBy('w.timestamp', 'DESC')
            ->setParameter('text', $search_str);

        return $query->getQuery()->getArrayResult();
    }

}
