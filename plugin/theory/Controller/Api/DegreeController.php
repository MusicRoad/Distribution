<?php

namespace MusicRoad\TheoryBundle\Controller\Api;

use MusicRoad\TheoryBundle\Entity\Degree;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as EXT;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Degree CRUD Controller.
 *
 * @EXT\Route("/degrees")
 */
class DegreeController extends Controller
{
    /**
     * List all Degrees.
     *
     * @EXT\Route("")
     * @EXT\Method("GET")
     *
     * @return JsonResponse
     */
    public function listAction()
    {
        $entities = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository(Degree::class)
            ->findBy([], []);

        return new JsonResponse($entities);
    }
}
