<?php

namespace MusicRoad\InstrumentBundle\DataFixtures\ORM;

use MusicRoad\InstrumentBundle\Entity\InstrumentType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Initializes instrument types.
 */
class LoadInstrumentTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $types = $this->getData();
        foreach ($types as $type) {
            $entity = new InstrumentType();

            $entity->setName($type['name']);
            $entity->setClass($type['class']);
            $entity->setPolyphonic($type['polyphonic']);
            $entity->setTunable($type['tunable']);

            // Auto enable all instrument types
            $entity->setEnabled(true);

            $manager->persist($entity);

            // Store reference for use in other DataFixtures
            $this->addReference(strtolower($type['name']), $entity);
        }

        $manager->flush();
    }

    private function getData()
    {
        return [
            [
                'name' => 'guitar',
                'class' => '\MusicRoad\InstrumentBundle\Entity\InstrumentType\Guitar',
                'polyphonic' => true,
                'tunable' => true,
            ],
            [
                'name' => 'ukulele',
                'class' => '\MusicRoad\InstrumentBundle\Entity\InstrumentType\Guitar',
                'polyphonic' => true,
                'tunable' => true,
            ],
            [
                'name' => 'bass',
                'class' => '\MusicRoad\InstrumentBundle\Entity\InstrumentType\Guitar',
                'polyphonic' => true,
                'tunable' => true,
            ],
            [
                'name' => 'recorder',
                'class' => '\MusicRoad\InstrumentBundle\Entity\InstrumentType\Recorder',
                'polyphonic' => false,
                'tunable' => true,
            ],
            [
                'name' => 'keyboard',
                'class' => '\MusicRoad\InstrumentBundle\Entity\InstrumentType\Keyboard',
                'polyphonic' => true,
                'tunable' => false,
            ],
            [
                'name' => 'drums',
                'class' => '\MusicRoad\InstrumentBundle\Entity\InstrumentType\Drums',
                'polyphonic' => false,
                'tunable' => false,
            ],
            [
                'name' => 'vocals',
                'class' => '\MusicRoad\InstrumentBundle\Entity\InstrumentType\Vocals',
                'polyphonic' => false,
                'tunable' => true,
            ],
        ];
    }
}
