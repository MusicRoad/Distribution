<?php

namespace MusicRoad\TheoryBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as EXT;
use Symfony\Component\HttpFoundation\JsonResponse;
use MusicRoad\TheoryBundle\Entity\Scale;

/**
 * Scale CRUD Controller.
 *
 * @EXT\Route("/scales")
 */
class ScaleController extends Controller
{
    /**
     * List all Scales.
     *
     * @EXT\Route("")
     * @EXT\Method("GET")
     *
     * @return JsonResponse
     */
    public function listAction()
    {
        $entities = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository(Scale::class)
            ->findBy([], []);

        return new JsonResponse($entities);
    }

    /**
     * Get a Scale entity.
     *
     * @EXT\Route("/{id}")
     * @EXT\Method("GET")
     *
     * @param Scale $scale
     *
     * @return JsonResponse
     */
    public function getAction(Scale $scale)
    {
        return new JsonResponse($scale);
    }
}
