import React from 'react'

import {getDefinition} from '~/music-road/distribution/plugin/instrument/instruments'

const Tuner = props =>
  <div className="">
    {React.createElement(getDefinition(props.instrument.type.name).tuner, {

    })}
  </div>

Tuner.propTypes = {

}

export {
  Tuner
}
