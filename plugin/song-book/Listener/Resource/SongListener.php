<?php

namespace MusicRoad\SongBookBundle\Listener\Resource;

use Claroline\AppBundle\API\SerializerProvider;
use Claroline\CoreBundle\Event\Resource\LoadResourceEvent;
use JMS\DiExtraBundle\Annotation as DI;
use MusicRoad\SongBookBundle\Entity\Song;

/**
 * Listens to resource events dispatched by the core.
 *
 * @DI\Service()
 */
class SongListener
{
    /**
     * @var SerializerProvider
     */
    private $serializer;

    /**
     * SongListener constructor.
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
     * Loads the Song resource.
     *
     * @DI\Observe("resource.music_artist.load")
     *
     * @param LoadResourceEvent $event
     */
    public function onLoad(LoadResourceEvent $event)
    {
        /** @var Song $song */
        $song = $event->getResource();

        $event->setData([
            'song' => $this->serializer->serialize($song),
        ]);

        $event->stopPropagation();
    }
}
