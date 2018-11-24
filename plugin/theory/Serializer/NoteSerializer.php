<?php

namespace MusicRoad\TheoryBundle\Serializer;

use MusicRoad\TheoryBundle\Entity\Note\Note;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("claroline.serializer.music_note")
 * @DI\Tag("claroline.serializer")
 */
class NoteSerializer
{
    /**
     * @return string
     */
    public function getClass()
    {
        return Note::class;
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return '~/music-road/distribution/plugin/theory/note.json';
    }

    /**
     * @return string
     */
    public function getSamples()
    {
        return '~/music-road/distribution/plugin/theory/note';
    }

    public function serialize(Note $note, array $options = [])
    {
        $noteInfo = $note->getInfo();

        return [
            'id' => $note->getUuid(),
            // Note properties
            'value' => $note->getValue(),
            'octave' => $note->getOctave(),
            'frequency' => $note->getFrequency(),
            'midi' => $note->getMidi(),

            // Flatten NoteInfo properties for simpler structure
            'sharp_name' => $noteInfo->getSharpName(),
            'flat_name' => $noteInfo->getFlatName(),
            'accidental' => $noteInfo->isAccidental(),
            'color' => $noteInfo->getColor(),
        ];
    }
}
