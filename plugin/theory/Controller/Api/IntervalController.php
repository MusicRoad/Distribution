<?php

namespace MusicRoad\TheoryBundle\Controller\Api;

use MusicRoad\TheoryBundle\Entity\Interval;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as EXT;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Interval CRUD Controller.
 *
 * @EXT\Route("/intervals")
 */
class IntervalController extends Controller
{
    /**
     * List all Intervals.
     *
     * @EXT\Route("")
     * @EXT\Method("GET")
     *
     * @return JsonResponse
     */
    public function listAction()
    {
        $entities = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository(Interval::class)
            ->findBy([], ['value' => 'ASC']);

        return new JsonResponse($entities);
    }
}
