<?php

namespace MusicRoad\InstrumentBundle\Serializer\InstrumentType;

use MusicRoad\InstrumentBundle\Entity\InstrumentType\Recorder;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("claroline.serializer.instrument_recorder")
 * @DI\Tag("claroline.serializer")
 */
class RecorderSerializer
{
    /**
     * @return string
     */
    public function getClass()
    {
        return 'MusicRoad\InstrumentBundle\Entity\InstrumentType\Recorder';
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return '#/plugin/music-instrument/recorder.json';
    }

    /**
     * @return string
     */
    public function getSamples()
    {
        return '#/plugin/music-instrument/recorder';
    }

    public function serialize(Recorder $recorder, array $options = [])
    {
        return [
            'range' => $recorder->getRange(),
            'fingering' => $recorder->getFingering(),
        ];
    }
}
