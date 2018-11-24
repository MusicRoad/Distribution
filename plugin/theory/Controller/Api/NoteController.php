<?php

namespace MusicRoad\TheoryBundle\Controller\Api;

use MusicRoad\TheoryBundle\Entity\Note\Note;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as EXT;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Note CRUD Controller.
 *
 * @EXT\Route("/notes")
 */
class NoteController extends Controller
{
    /**
     * List all Notes.
     *
     * @EXT\Route("")
     * @EXT\Method("GET")
     *
     * @return JsonResponse
     */
    public function listAction()
    {
        $entities = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository(Note::class)
            ->findBy([], ['value' => 'ASC']);

        return new JsonResponse($entities);
    }
}
