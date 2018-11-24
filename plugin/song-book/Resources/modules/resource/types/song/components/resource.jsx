import React from 'react'

import {Routes} from '#/main/app/router'
import {ResourcePage} from '#/main/core/resource/containers/page'

import {Editor} from '~/music-road/distribution/plugin/song-book/resource/types/song/editor/components/editor'
import {Player} from '~/music-road/distribution/plugin/song-book/resource/types/song/player/components/player'

const Resource = props =>
  <ResourcePage
    formContainer={{
      name: 'song',
      path: '/edit',
      action: (song) => ['api_song_update', {id: song.id}]
    }}
  >
    <Routes routes={[
      {
        path: '/',
        exact: true,
        component: Player
      }, {
        path: '/edit',
        component: Editor
      }
    ]} />
  </ResourcePage>

export {
  Resource
}
