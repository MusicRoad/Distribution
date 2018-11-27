import {PropTypes as T} from 'prop-types'

//import {Note} from '~/music-road/distribution/plugin/theory/prop-types'

const Tuning = {
  propTypes: {
    id: T.string.isRequired,
    name: T.string.isRequired,
    notes: T.arrayOf(
      //T.shape(Note.propTypes)
    ).isRequired
  },
  defaultProps: {

  }
}

export {
  Tuning
}
