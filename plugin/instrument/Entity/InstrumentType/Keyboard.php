<?php

namespace MusicRoad\InstrumentBundle\Entity\InstrumentType;

use Doctrine\ORM\Mapping as ORM;

/**
 * Keyboard.
 * Used to store the configuration of a Keyboard.
 *
 * @ORM\Entity()
 * @ORM\Table(name="music_instrument_keyboard")
 */
class Keyboard extends AbstractType
{
    /**
     * Number of keys of the keyboard.
     *
     * @ORM\Column(name="nb_keys", type="integer")
     *
     * @var int
     */
    private $keys = 88;

    /**
     * Get number of keys.
     *
     * @return int
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * Set number of keys.
     *
     * @param int $keys
     *
     * @return $this
     */
    public function setKeys($keys)
    {
        $this->keys = $keys;

        return $this;
    }
}
