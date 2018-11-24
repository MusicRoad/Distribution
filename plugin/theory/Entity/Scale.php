<?php

namespace MusicRoad\TheoryBundle\Entity;

use Claroline\AppBundle\Entity\Identifier\Id;
use Claroline\AppBundle\Entity\Identifier\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * Scale.
 *
 * @ORM\Entity()
 * @ORM\Table(name="music_scale")
 */
class Scale implements \JsonSerializable
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
     * Scale constructor.
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
     * Serialize the Entity.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array(
            'type' => 'scales',
            'id' => $this->id,
            'attributes' => array(
                'name' => $this->name,
            ),
        );
    }
}
