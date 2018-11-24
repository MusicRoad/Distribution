<?php

namespace MusicRoad\InstrumentBundle\Serializer;

use MusicRoad\InstrumentBundle\Entity\InstrumentType;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("claroline.serializer.instrument_type")
 * @DI\Tag("claroline.serializer")
 */
class InstrumentTypeSerializer
{
    /**
     * @return string
     */
    public function getClass()
    {
        return InstrumentType::class;
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return '~/music-road/distribution/plugin/instrument/instrument-type.json';
    }

    /**
     * @return string
     */
    public function getSamples()
    {
        return '~/music-road/distribution/plugin/instrument/instrument-type';
    }

    public function serialize(InstrumentType $instrumentType, array $options = [])
    {
        return [
            'id' => $instrumentType->getUuid(),
            'name' => $instrumentType->getName(),
            'tunable' => $instrumentType->isTunable(),
            'polyphonic' => $instrumentType->isPolyphonic(),
        ];
    }
}
