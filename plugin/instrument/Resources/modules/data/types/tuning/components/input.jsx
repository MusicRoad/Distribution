import React from 'react'

import {PropTypes as T, implementPropTypes} from '#/main/app/prop-types'
import {FormField as FormFieldTypes} from '#/main/core/layout/form/prop-types'
import {Tuning as TuningTypes} from '~/music-road/distribution/plugin/instrument/data/types/tuning/prop-types'

const Tuning = props =>
  <div className="">
    TUNING
  </div>

implementPropTypes(Tuning, FormFieldTypes, {
  value: T.shape(
    TuningTypes.propTypes
  ),
  instrumentType: T.string
})

export {
  Tuning
}
