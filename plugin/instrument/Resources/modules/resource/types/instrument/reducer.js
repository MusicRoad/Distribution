import {makeFormReducer} from '#/main/app/content/form/store/reducer'

/*import {
 TUNING_SELECT
 } from './actions'*/

const reducer = {
  instrument: makeFormReducer('instrument')
}

export {
  reducer
}
