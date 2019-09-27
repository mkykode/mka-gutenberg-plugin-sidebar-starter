import { PluginSidebar, PluginSidebarMoreMenuItem } from '@wordpress/edit-post'
// import { Fragment } from '@wordpress/element'
import PluginMetaFields from './components/PluginMetaFields'
import { withSelect } from '@wordpress/data'
import { __ } from '@wordpress/i18n'

const CustomSidebar = ({ postType }) => {
  console.log(postType)

  return (
    <>
      {postType == 'post' ? (
        <>
          <PluginSidebarMoreMenuItem target="mk-doc-sidebar">
            {__('Meta Options', 'mk')}
          </PluginSidebarMoreMenuItem>
          <PluginSidebar name="mk-doc-sidebar" title={__('Meta Options', 'mk')}>
            <PluginMetaFields></PluginMetaFields>
          </PluginSidebar>
        </>
      ) : null}
    </>
  )
}

export default withSelect(select => {
  return {
    postType: select('core/editor').getCurrentPostType()
  }
})(CustomSidebar)
