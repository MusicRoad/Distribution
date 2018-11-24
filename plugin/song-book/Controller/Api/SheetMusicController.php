<?php

namespace MusicRoad\SongBookBundle\Controller\Api;

use MusicRoad\SongBookBundle\Entity\SheetMusic;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as EXT;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * SheetMusic CRUD Controller.
 *
 * @EXT\Route("/sheet_music", options={"expose"=true})
 */
class SheetMusicController
{
    /**
     * Lists all SheetMusic.
     *
     * @EXT\Route("")
     * @EXT\Method("GET")
     *
     * @return JsonResponse
     */
    public function listAction()
    {
        $entities = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('MusicRoadSongBookBundle:SheetMusic')
            ->findBy([], ['name' => 'ASC']);

        return new JsonResponse($entities);
    }

    /**
     * Gets a SheetMusic entity.
     *
     * @EXT\Route("/{id}")
     * @EXT\Method("GET")
     *
     * @param SheetMusic $sheetMusic
     *
     * @return JsonResponse
     */
    public function getAction(SheetMusic $sheetMusic)
    {
        return new JsonResponse($sheetMusic);
    }

    /**
     * Deletes a SheetMusic.
     *
     * @EXT\Route("/{id}")
     * @EXT\Method("DELETE")
     *
     * @param SheetMusic $sheetMusic
     *
     * @return JsonResponse
     */
    public function deleteAction(SheetMusic $sheetMusic)
    {
        $this->getDoctrine()->getManager()->remove($sheetMusic);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse(null, 204);
    }
}
