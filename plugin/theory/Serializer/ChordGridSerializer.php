<?php

namespace MusicRoad\TheoryBundle\Serializer;

use MusicRoad\TheoryBundle\Entity\ChordGrid;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("claroline.serializer.chord_grid")
 * @DI\Tag("claroline.serializer")
 */
class ChordGridSerializer
{
    /**
     * @return string
     */
    public function getClass()
    {
        return 'MusicRoad\TheoryBundle\Entity\ChordGrid';
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return '#/plugin/music-theory/chord-grid.json';
    }

    /**
     * @return string
     */
    public function getSamples()
    {
        return '#/plugin/music-theory/chord-grid';
    }

    public function serialize(ChordGrid $chordGrid, array $options = [])
    {
        return [

        ];
    }
}
