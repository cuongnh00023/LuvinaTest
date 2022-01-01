<?php

namespace Luvina\Test\Controller\Adminhtml\Books;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Books backend index (list) controller.
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     */
    const ADMIN_RESOURCE = 'Luvina_Test::management';

    /**
     * Execute action based on request and return result.
     *
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->setActiveMenu('Luvina_Test::management');
        $resultPage->addBreadcrumb(__('Books'), __('Books'));
        $resultPage->addBreadcrumb(__('Manage Bookss'), __('Manage Bookss'));
        $resultPage->getConfig()->getTitle()->prepend(__('Books List'));

        return $resultPage;
    }
}
