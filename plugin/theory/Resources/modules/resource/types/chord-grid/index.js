import {bootstrap} from '#/main/app/dom/bootstrap'

import {reducer} from '~/music-road/distribution/plugin/theory/resource/types/chord-grid/reducer'

import {Resource} from '~/music-road/distribution/plugin/theory/resource/types/chord-grid/components/resource.jsx'

// mount the react application
bootstrap(
  // app DOM container (also holds initial app data as data attributes)
  '.chord-grid-container',

  // app main component (accepts either a `routedApp` or a `ReactComponent`)
  Resource,

  // app store configuration
  reducer
)
