import {bootstrap} from '#/main/app/dom/bootstrap'

import {reducer} from '~/music-road/distribution/plugin/instrument/tuner/reducer'
import {Tool} from '~/music-road/distribution/plugin/instrument/tuner/components/tool.jsx'

// mount the react application
bootstrap(
  // app DOM container (also holds initial app data as data attributes)
  '.tuner-container',

  // app main component (accepts either a `routedApp` or a `ReactComponent`)
  Tool,

  // app store configuration
  reducer
)
