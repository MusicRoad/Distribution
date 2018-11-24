import {bootstrap} from '#/main/app/dom/bootstrap'

import {registerDefaultInstrumentTypes} from '~/music-road/distribution/plugin/instrument/instruments'

import {reducer} from '~/music-road/distribution/plugin/instrument/resource/types/instrument/reducer'
import {Resource} from '~/music-road/distribution/plugin/instrument/resource/types/instrument/components/resource.jsx'

// register configured instruments
registerDefaultInstrumentTypes()

// mount the react application
bootstrap(
  // app DOM container (also holds initial app data as data attributes)
  '.instrument-container',

  // app main component (accepts either a `routedApp` or a `ReactComponent`)
  Resource,

  // app store configuration
  reducer,

  initialData => ({
    resourceNode: initialData.resourceNode,
    instrument: {
      originalData: initialData.instrument,
      data: initialData.instrument
    }
  })
)
