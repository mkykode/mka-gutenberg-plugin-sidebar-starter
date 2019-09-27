import { registerPlugin } from '@wordpress/plugins'
import {
  PluginBlockSettingsMenuItem,
  PluginDocumentSettingPanel
} from '@wordpress/edit-post'
import { PanelRow } from '@wordpress/components'
import CustomSidebar from './CustomSidebar'

registerPlugin('mk-sidebar', {
  icon: 'smiley',
  render: CustomSidebar
})
