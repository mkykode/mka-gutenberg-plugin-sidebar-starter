import { __ } from '@wordpress/i18n'
import { registerBlockType } from '@wordpress/blocks'
import { useState } from '@wordpress/element'
registerBlockType('mk/member', {
  title: __('Local695 User Form'),
  description: __('Display user details'),
  keywords: [__('local695')],
  icon: 'businessman',
  category: 'common',
  edit: props => {
    return <>form goes here</>
  },
  save: props => {
    return <>Hi</>
  }
})
