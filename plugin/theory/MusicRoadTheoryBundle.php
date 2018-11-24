<?php

namespace MusicRoad\TheoryBundle;

use Claroline\CoreBundle\Library\PluginBundle;

class MusicRoadTheoryBundle extends PluginBundle
{
    public function getRequiredFixturesDirectory($environment)
    {
        return 'DataFixtures/ORM';
    }
}
