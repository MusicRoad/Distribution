<?php

namespace MusicRoad\BookBundle;

use Claroline\CoreBundle\Library\PluginBundle;
use MusicRoad\InstrumentBundle\MusicRoadInstrumentBundle;

class MusicRoadSongBookBundle extends PluginBundle
{
    public function getRequiredPlugins()
    {
        return [
            MusicRoadInstrumentBundle::class,
        ];
    }
}
