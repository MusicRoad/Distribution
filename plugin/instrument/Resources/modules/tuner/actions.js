import {makeActionCreator} from '#/main/app/store/actions'

export const TUNING_SELECT = 'TUNING_SELECT'

export const actions = {}

actions.selectTuning = makeActionCreator(TUNING_SELECT, 'tuning')
