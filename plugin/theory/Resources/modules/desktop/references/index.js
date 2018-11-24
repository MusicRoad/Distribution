import {bootstrap} from '#/main/app/dom/bootstrap'

import {reducer} from '~/music-road/distribution/plugin/theory/desktop/references/reducer'

import {Tool} from '~/music-road/distribution/plugin/theory/desktop/references/components/tool.jsx'

// mount the react application
bootstrap(
  // app DOM container (also holds initial app data as data attributes)
  '.references-container',

  // app main component (accepts either a `routedApp` or a `ReactComponent`)
  Tool,

  // app store configuration
  reducer
)
