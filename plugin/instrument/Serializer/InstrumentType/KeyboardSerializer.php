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
        return Keyboard::class;
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return '~/music-road/distribution/plugin/instrument/keyboard.json';
    }

    /**
     * @return string
     */
    public function getSamples()
    {
        return '~/music-road/distribution/plugin/instrument/keyboard';
    }

    public function serialize(Keyboard $keyboard, array $options = [])
    {
        return [
            'keys' => $keyboard->getKeys(),
        ];
    }
}
