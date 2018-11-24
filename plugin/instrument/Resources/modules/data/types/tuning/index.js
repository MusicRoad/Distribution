import {trans} from '#/main/app/intl/translation'

import {TuningGroup} from '~/music-road/distribution/plugin/instrument/data/types/tuning/components/group'
import {TuningInput} from '~/music-road/distribution/plugin/instrument/data/types/tuning/components/input'

const dataType = {
  name: 'tuning',
  meta: {
    creatable: false,
    icon: 'fa fa-fw fa-signal',
    label: trans('tuning'),
    description: trans('tuning_desc')
  },
  parse: (display) => display,
  render: (raw) => raw,
  validate: (value) => undefined, // todo implement
  components: {
    form: TuningGroup,
    group: TuningGroup,
    input: TuningInput
  }
}

export {
  dataType
}
