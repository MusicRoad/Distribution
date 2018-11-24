<?php

namespace MusicRoad\InstrumentBundle\Listener\Resource;

use Claroline\AppBundle\API\SerializerProvider;
use Claroline\CoreBundle\Event\Resource\LoadResourceEvent;
use JMS\DiExtraBundle\Annotation as DI;
use MusicRoad\InstrumentBundle\Entity\Instrument;

/**
 * Listens to resource events dispatched by the core.
 *
 * @DI\Service()
 */
class InstrumentListener
{
    /**
     * @var SerializerProvider
     */
    private $serializer;

    /**
     * InstrumentListener constructor.
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
     * Loads the Instrument resource.
     *
     * @DI\Observe("resource.music_instrument.load")
     *
     * @param LoadResourceEvent $event
     */
    public function onLoad(LoadResourceEvent $event)
    {
        /** @var Instrument $instrument */
        $instrument = $event->getResource();

        $event->setData([
            'instrument' => $this->serializer->serialize($instrument),
        ]);

        $event->stopPropagation();
    }
}
