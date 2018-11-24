<?php

namespace MusicRoad\TheoryBundle\Entity;

use Claroline\AppBundle\Entity\Identifier\Id;
use Claroline\AppBundle\Entity\Identifier\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * Degree.
 *
 * @ORM\Entity()
 * @ORM\Table(name="music_degree")
 */
class Degree implements \JsonSerializable
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
     * Symbol of the Degree.
     *
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $symbol;

    /**
     * Degree constructor.
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
     * @return Degree
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Serialize the Entity.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array(
            'type' => 'degrees',
            'id' => $this->id,
            'attributes' => array(
                'name' => $this->name,
                'symbol' => $this->symbol,
            ),
        );
    }
}
