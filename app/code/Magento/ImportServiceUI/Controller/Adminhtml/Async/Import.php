<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\ImportServiceUI\Controller\Adminhtml\Async;

use Magento\Backend\App\Action;

/**
 * Import controller
 */
abstract class Import extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_ImportServiceUI::async_import';
}
