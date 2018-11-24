<?php

namespace MusicRoad\SongBookBundle\Listener\Resource;

use Claroline\AppBundle\API\SerializerProvider;
use Claroline\CoreBundle\Event\Resource\LoadResourceEvent;
use JMS\DiExtraBundle\Annotation as DI;
use MusicRoad\SongBookBundle\Entity\SheetMusic;

/**
 * Listens to resource events dispatched by the core.
 *
 * @DI\Service()
 */
class SheetMusicListener
{
    /**
     * @var SerializerProvider
     */
    private $serializer;

    /**
     * SheetMusicListener constructor.
     *
     * @DI\InjectParams({
     *     "serializer" = @DI\Inject("claroline.api.serializer")
     * })
     *
     * @param SerializerProvider $serializer
     */
    public function __construct(SerializerProvider $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Loads the SheetMusic resource.
     *
     * @DI\Observe("resource.music_artist.load")
     *
     * @param LoadResourceEvent $event
     */
    public function onLoad(LoadResourceEvent $event)
    {
        /** @var SheetMusic $artist */
        $sheetMusic = $event->getResource();

        $event->setData([
            'sheetMusic' => $this->serializer->serialize($sheetMusic),
        ]);

        $event->stopPropagation();
    }
}
