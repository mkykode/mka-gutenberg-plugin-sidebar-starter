import { PanelBody, TextControl } from '@wordpress/components'
import { withSelect, withDispatch } from '@wordpress/data'
import { compose } from '@wordpress/compose'
import { __ } from '@wordpress/i18n'

const PluginMetaFields = ({ text_metafield, onMetaFieldChange }) => {
  console.log(text_metafield)

  return (
    <>
      <PanelBody
        title={__('Meta Fields Panel', 'mk')}
        icon="admin-post"
        intialOpen={true}
      >
        <TextControl
          value={text_metafield}
          label={__('Text Meta', 'mk')}
          onChange={value => onMetaFieldChange(value)}
        />
      </PanelBody>
    </>
  )
}
export default compose(
  withSelect(select => {
    return {
      text_metafield: select('core/editor').getEditedPostAttribute('meta')[
        'text_metafield'
      ]
    }
  }),
  withDispatch(dispatch => {
    return {
      onMetaFieldChange: value => {
        dispatch('core/editor').editPost({ meta: { text_metafield: value } })
      }
    }
  })
)(PluginMetaFields)
