<?php

namespace MusicRoad\InstrumentBundle\Entity\InstrumentType;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vocals.
 * Used to store the configuration of Vocals.
 *
 * @ORM\Entity()
 * @ORM\Table(name="music_instrument_vocals")
 */
class Vocals extends AbstractType
{
    /**
     * Serialize the Entity.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
        ];
    }
}
