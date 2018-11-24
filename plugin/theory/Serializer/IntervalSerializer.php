<?php

namespace MusicRoad\TheoryBundle\Serializer;

use MusicRoad\TheoryBundle\Entity\Interval;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("claroline.serializer.music_interval")
 * @DI\Tag("claroline.serializer")
 */
class IntervalSerializer
{
    /**
     * @return string
     */
    public function getClass()
    {
        return Interval::class;
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return '~/music-road/distribution/plugin/theory/interval.json';
    }

    /**
     * @return string
     */
    public function getSamples()
    {
        return '~/music-road/distribution/plugin/theory/interval';
    }

    public function serialize(Interval $interval, array $options = [])
    {
        return [
            'id' => $interval->getId(),
            'name' => $interval->getName(),
            'symbol' => $interval->getSymbol(),
            'number' => $interval->getNumber(),
            'quality' => $interval->getQuality(),
            'value' => $interval->getValue(),
        ];
    }
}
