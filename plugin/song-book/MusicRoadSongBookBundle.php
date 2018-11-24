<?php

namespace MusicRoad\SongBookBundle;

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
