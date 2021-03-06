<?php

namespace MusicRoad\InstrumentBundle\Serializer\InstrumentType;

use Claroline\AppBundle\API\SerializerProvider;
use MusicRoad\InstrumentBundle\Entity\InstrumentType\Guitar;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("claroline.serializer.instrument_guitar")
 * @DI\Tag("claroline.serializer")
 */
class GuitarSerializer
{
    /** @var SerializerProvider */
    private $serializer;

    /**
     * InstrumentSerializer constructor.
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
     * @return string
     */
    public function getClass()
    {
        return Guitar::class;
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return '~/music-road/distribution/plugin/instrument/guitar.json';
    }

    /**
     * @return string
     */
    public function getSamples()
    {
        return '~/music-road/distribution/plugin/instrument/guitar';
    }

    public function serialize(Guitar $guitar, array $options = [])
    {
        return [
            'tuning' => $this->serializer->serialize($guitar->getTuning(), $options),
            'strings' => $guitar->getStrings(),
            'frets' => $guitar->getFrets(),
            'fretless' => $guitar->isFretless(),
            'leftHanded' => $guitar->isLeftHanded(),
            'markers' => $guitar->getMarkers(),
            'headstock' => $guitar->getHeadstock(),
            'body' => $guitar->getBody(),
            'amplification' => $guitar->getAmplification(),
        ];
    }
}
