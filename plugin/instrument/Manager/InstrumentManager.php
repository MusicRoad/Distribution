<?php

namespace MusicRoad\InstrumentBundle\Manager;

use Claroline\CoreBundle\Persistence\ObjectManager;
use MusicRoad\InstrumentBundle\Entity\Instrument;
use MusicRoad\InstrumentBundle\Serializer\Serializer;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * Manages instruments.
 *
 * @DI\Service("ujm_exo.manager.exercise")
 */
class InstrumentManager
{
    /** @var Serializer */
    private $serializer;

    private $om;

    /**
     * InstrumentManager constructor.
     *
     * @DI\InjectParams({
     *     "om" = @DI\Inject("claroline.persistence.object_manager")
     * })
     *
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    public function export(Instrument $instrument, $format)
    {
        return $this->serializer->serialize($instrument, $format);
    }

    public function import(\stdClass $instrumentData, $format)
    {

    }

    /**
     * Create a new instrument.
     *
     * @param \stdClass $data
     *
     * @return Instrument
     */
    public function create(\stdClass $data)
    {
        return $this->update($data, new Instrument());
    }

    /**
     * Update an instrument.
     *
     * @param \stdClass  $data
     * @param Instrument $instrument
     *
     * @return Instrument
     */
    public function update(\stdClass $data, Instrument $instrument)
    {
        $this->om->persist($instrument);
        $this->om->flush();

        return $instrument;
    }

    /**
     * Copy an instrument.
     *
     * @param Instrument $instrument
     *
     * @return Instrument
     */
    public function copy(Instrument $instrument)
    {
        return $instrument;
    }

    /**
     * Delete an instrument.
     *
     * @param Instrument $instrument
     */
    public function delete(Instrument $instrument)
    {
        $this->om->remove($instrument);
        $this->om->flush();
    }
}
