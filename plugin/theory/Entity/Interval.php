<?php

namespace MusicRoad\TheoryBundle\Entity;

use Claroline\AppBundle\Entity\Identifier\Id;
use Claroline\AppBundle\Entity\Identifier\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * Interval.
 *
 * @ORM\Entity()
 * @ORM\Table(name="music_interval")
 */
class Interval
{
    use Id;
    use Uuid;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $name;

    /**
     * Symbol of the Interval.
     *
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $symbol;

    /**
     * Number of the Interval.
     *
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * Quality of the Interval (perfect, minor, major, diminished or augmented).
     *
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $quality;

    /**
     * Value of the Interval (in semitones).
     *
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * Interval constructor.
     */
    public function __construct()
    {
        $this->refreshUuid();
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get symbol.
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Set symbol.
     *
     * @param string $symbol
     *
     * @return $this
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get number.
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set number.
     *
     * @param int $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get quality.
     *
     * @return string
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set quality.
     *
     * @param string $quality
     *
     * @return $this
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get value (in semitones).
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value.
     *
     * @param int $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
