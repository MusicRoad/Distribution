<?php

namespace MusicRoad\SongBookBundle\Listener\Resource;

use Claroline\AppBundle\API\SerializerProvider;
use Claroline\CoreBundle\Event\Resource\LoadResourceEvent;
use JMS\DiExtraBundle\Annotation as DI;
use MusicRoad\SongBookBundle\Entity\Artist;

/**
 * Listens to resource events dispatched by the core.
 *
 * @DI\Service()
 */
class ArtistListener
{
    /**
     * @var SerializerProvider
     */
    private $serializer;

    /**
     * ArtistListener constructor.
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
     * Loads the Artist resource.
     *
     * @DI\Observe("resource.music_artist.load")
     *
     * @param LoadResourceEvent $event
     */
    public function onLoad(LoadResourceEvent $event)
    {
        /** @var Artist $artist */
        $artist = $event->getResource();

        $event->setData([
            'artist' => $this->serializer->serialize($artist),
        ]);

        $event->stopPropagation();
    }
}
