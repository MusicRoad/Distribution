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
        return 'MusicRoad\InstrumentBundle\Entity\InstrumentType';
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return '#/plugin/music-instrument/instrument-type.json';
    }

    /**
     * @return string
     */
    public function getSamples()
    {
        return '#/plugin/music-instrument/instrument-type';
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
