import React from 'react'

import {Routes} from '#/main/app/router'
import {ResourcePage} from '#/main/core/resource/containers/page'

import {Editor} from '~/music-road/distribution/plugin/instrument/resource/types/instrument/editor/components/editor'
import {Player} from '~/music-road/distribution/plugin/instrument/resource/types/instrument/player/components/player'

const Resource = props =>
  <ResourcePage
    formContainer={{
      name: 'instrument',
      path: '/edit',
      action: (instrument) => ['api_instrument_update', {id: instrument.id}]
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
