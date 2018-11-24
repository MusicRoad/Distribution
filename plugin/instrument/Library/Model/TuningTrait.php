<?php

namespace MusicRoad\InstrumentBundle\Library\Model;

use MusicRoad\InstrumentBundle\Entity\Tuning\Tuning;

/**
 * Add a `tuning` field to an Entity class.
 */
trait TuningTrait
{
    /**
     * Tuning.
     *
     * @var Tuning
     *
     * @ORM\ManyToOne(targetEntity="MusicRoad\InstrumentBundle\Entity\Tuning\Tuning")
     * @ORM\JoinColumn(name="tuning_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $tuning;

    /**
     * Get tuning.
     *
     * @return Tuning
     */
    public function getTuning()
    {
        return $this->tuning;
    }

    /**
     * Set tuning.
     *
     * @param Tuning $tuning
     *
     * @return $this
     */
    public function setTuning(Tuning $tuning = null)
    {
        $this->tuning = $tuning;

        return $this;
    }
}
