<?php

namespace MusicRoad\InstrumentBundle\Serializer\InstrumentType;

use MusicRoad\InstrumentBundle\Entity\InstrumentType\Keyboard;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("claroline.serializer.instrument_keyboard")
 * @DI\Tag("claroline.serializer")
 */
class KeyboardSerializer
{
    /**
     * @return string
     */
    public function getClass()
    {
        return 'MusicRoad\InstrumentBundle\Entity\InstrumentType\Keyboard';
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return '#/plugin/music-instrument/keyboard.json';
    }

    /**
     * @return string
     */
    public function getSamples()
    {
        return '#/plugin/music-instrument/keyboard';
    }

    public function serialize(Keyboard $keyboard, array $options = [])
    {
        return [
            'keys' => $keyboard->getKeys(),
        ];
    }
}
