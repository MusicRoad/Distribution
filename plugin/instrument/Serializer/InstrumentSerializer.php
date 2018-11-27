<?php

namespace MusicRoad\InstrumentBundle\Serializer;

use Claroline\AppBundle\API\SerializerProvider;
use MusicRoad\InstrumentBundle\Entity\Instrument;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("claroline.serializer.instrument")
 * @DI\Tag("claroline.serializer")
 */
class InstrumentSerializer
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
        return Instrument::class;
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return '~/music-road/distribution/plugin/instrument/instrument.json';
    }

    /**
     * @return string
     */
    public function getSamples()
    {
        return '~/music-road/distribution/plugin/instrument/instrument';
    }

    public function serialize(Instrument $instrument, array $options = [])
    {
        return array_merge(
            // get specific instrument type data
            $this->serializer->serialize($instrument->getSpecification(), $options),

            // get common instrument data (merged in 2nd to avoid specification override base keys)
            [
                'id' => $instrument->getUuid(),
                'type' => $this->serializer->serialize($instrument->getType(), $options),
                'manufacturer' => $instrument->getManufacturer(),
                'model' => $instrument->getModel(),
                'midi' => $instrument->getMidi(),
            ]
        );
    }
}
