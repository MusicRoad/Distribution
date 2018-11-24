<?php

namespace MusicRoad\TheoryBundle\Listener\Resource;

use Claroline\AppBundle\API\SerializerProvider;
use Claroline\CoreBundle\Event\Resource\LoadResourceEvent;
use MusicRoad\TheoryBundle\Entity\ChordGrid;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * Listens to resource events dispatched by the core.
 *
 * @DI\Service()
 */
class ChordGridListener
{
    /**
     * @var SerializerProvider
     */
    private $serializer;

    /**
     * ChordGridListener constructor.
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
     * Loads the ChordGrid resource.
     *
     * @DI\Observe("resource.music_chord_grid.load")
     *
     * @param LoadResourceEvent $event
     */
    public function onLoad(LoadResourceEvent $event)
    {
        /** @var ChordGrid $chordGrid */
        $chordGrid = $event->getResource();

        $event->setData([
            'chordGrid' => $this->serializer->serialize($chordGrid),
        ]);

        $event->stopPropagation();
    }
}
