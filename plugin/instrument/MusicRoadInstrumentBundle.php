<?php

namespace MusicRoad\InstrumentBundle;

use Claroline\CoreBundle\Library\PluginBundle;
use MusicRoad\TheoryBundle\MusicRoadTheoryBundle;

class MusicRoadInstrumentBundle extends PluginBundle
{
    public function getRequiredPlugins()
    {
        return [
            MusicRoadTheoryBundle::class,
        ];
    }

    public function getRequiredFixturesDirectory($environment)
    {
        return 'DataFixtures/ORM';
    }
}
