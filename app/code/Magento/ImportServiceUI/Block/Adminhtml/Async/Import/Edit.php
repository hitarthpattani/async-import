<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\ImportServiceUI\Block\Adminhtml\Async\Import;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Internal constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();

        $this->buttonList->remove('back');
        $this->buttonList->remove('reset');
        $this->buttonList->update('save', 'label', __('Check Data'));

        $this->_objectId = 'uuid';
        $this->_blockGroup = 'Magento_ImportServiceUI';
        $this->_controller = 'adminhtml_async_import';
    }

    /**
     * Get header text
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        return __('Asynchronous Import');
    }
}
