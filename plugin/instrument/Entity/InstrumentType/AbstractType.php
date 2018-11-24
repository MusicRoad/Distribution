<?php

namespace MusicRoad\InstrumentBundle\Entity\InstrumentType;

use MusicRoad\InstrumentBundle\Entity\Instrument;
use Doctrine\ORM\Mapping as ORM;

/**
 * Base class for all types of instrument.
 *
 * @ORM\MappedSuperclass()
 */
abstract class AbstractType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    protected $id;

    /**
     * General information about the Instrument.
     *
     * @var Instrument
     *
     * @ORM\OneToOne(targetEntity="MusicRoad\InstrumentBundle\Entity\Instrument")
     * @ORM\JoinColumn(name="instrument_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $instrument;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get info.
     *
     * @return Instrument
     */
    public function getInstrument()
    {
        return $this->instrument;
    }

    /**
     * Set instrument.
     *
     * @param Instrument $instrument
     *
     * @return AbstractType
     */
    public function setInstrument(Instrument $instrument)
    {
        $this->instrument = $instrument;

        return $this;
    }
}
