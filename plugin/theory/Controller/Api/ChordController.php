<?php

namespace MusicRoad\TheoryBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as EXT;
use Symfony\Component\HttpFoundation\JsonResponse;
use MusicRoad\TheoryBundle\Entity\Chord;

/**
 * Chord CRUD Controller.
 *
 * @EXT\Route("/chords")
 */
class ChordController extends Controller
{
    /**
     * List all Chords.
     *
     * @EXT\Route("")
     * @EXT\Method("GET")
     *
     * @return JsonResponse
     */
    public function listAction()
    {
        $entities = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository(Chord::class)
            ->findBy([], []);

        return new JsonResponse($entities);
    }

    /**
     * Get a Chord entity.
     *
     * @EXT\Route("/{id}")
     * @EXT\Method("GET")
     *
     * @param Chord $chord
     *
     * @return JsonResponse
     */
    public function getAction(Chord $chord)
    {
        return new JsonResponse($chord);
    }
}
