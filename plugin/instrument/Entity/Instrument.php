<?php

namespace MusicRoad\InstrumentBundle\Entity;

use Claroline\CoreBundle\Entity\Model\UuidTrait;
use Claroline\CoreBundle\Entity\Resource\AbstractResource;
use MusicRoad\InstrumentBundle\Entity\InstrumentType\AbstractType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Instrument Entity.
 * Used to store the common configuration of all types of instrument.
 *
 * @ORM\Entity()
 * @ORM\EntityListeners({"\MusicRoad\InstrumentBundle\Listener\Entity\InstrumentListener"})
 * @ORM\Table(name="music_instrument")
 */
class Instrument extends AbstractResource
{
    use UuidTrait;

    /**
     * Type of the Instrument.
     *
     * @ORM\ManyToOne(targetEntity="MusicRoad\InstrumentBundle\Entity\InstrumentType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", onDelete="CASCADE")
     *
     * @var InstrumentType
     */
    private $type;

    /**
     * Midi number of the Instrument.
     *
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $midi = 10; // FIXME

    /**
     * Specification of the Instrument.
     *
     * @var AbstractType
     */
    private $specification;

    /**
     * Manufacturer of the Instrument.
     *
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    private $manufacturer;

    /**
     * Model of the Instrument.
     *
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    private $model;

    /**
     * Instrument constructor.
     */
    public function __construct()
    {
        $this->refreshUuid();
    }

    /**
     * Get type of the Instrument.
     *
     * @return InstrumentType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type of the Instrument.
     *
     * @param InstrumentType $type
     *
     * @return Instrument
     */
    public function setType(InstrumentType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get midi number.
     *
     * @return int
     */
    public function getMidi()
    {
        return $this->midi;
    }

    /**
     * Set midi number.
     *
     * @param int $midi
     *
     * @return Instrument
     */
    public function setMidi($midi)
    {
        $this->midi = $midi;

        return $this;
    }

    /**
     * Get specification.
     *
     * @return AbstractType
     */
    public function getSpecification()
    {
        return $this->specification;
    }

    /**
     * Set specification.
     *
     * @param AbstractType $specification
     *
     * @return Instrument
     */
    public function setSpecification(AbstractType $specification)
    {
        $this->specification = $specification;

        // Set inverse side of relationship
        $specification->setInstrument($this);

        return $this;
    }

    /**
     * Get manufacturer.
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set manufacturer.
     *
     * @param string $manufacturer
     *
     * @return Instrument
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get model.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set model.
     *
     * @param string $model
     *
     * @return Instrument
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }
}
