<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\ImportServiceUI\Controller\Adminhtml\Async\Import;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\ImportServiceUI\Controller\Adminhtml\Async\Import as ImportController;
use Magento\Framework\Controller\ResultFactory;

class Index extends ImportController implements HttpGetActionInterface
{
    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Magento_ImportServiceUI::system_convert_async_import');
        $resultPage->getConfig()->getTitle()->prepend(__('Import Service'));
        $resultPage->getConfig()->getTitle()->prepend(__('Asynchronous Import'));
        $resultPage->addBreadcrumb(__('Asynchronous Import'), __('Asynchronous Import'));
        return $resultPage;
    }
}
