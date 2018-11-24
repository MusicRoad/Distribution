import React from 'react'

import {PropTypes as T, implementPropTypes} from '#/main/app/prop-types'
import {FormGroup as FormGroupWithFieldTypes} from '#/main/core/layout/form/prop-types'
import {FormGroup} from '#/main/core/layout/form/components/group/form-group'

import {Tuning as TuningTypes} from '~/music-road/distribution/plugin/instrument/data/types/tuning/prop-types'
import {TuningInput} from '~/music-road/distribution/plugin/instrument/data/types/tuning/components/input'

const TuningGroup = props =>
  <FormGroup {...props}>
    <TuningInput {...props} />
  </FormGroup>

implementPropTypes(TuningGroup, FormGroupWithFieldTypes, {
  // more precise value type
  value: T.shape(
    TuningTypes.propTypes
  ),
  // custom props
  instrumentType: T.string
}, {
  value: null
})

export {
  TuningGroup
}
