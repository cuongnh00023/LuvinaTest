<?php

namespace Luvina\Test\Controller\Adminhtml\Books;

use Luvina\Test\Api\Data\BooksInterface;
use Luvina\Test\Api\Data\BooksInterfaceFactory;
use Luvina\Test\Command\Books\SaveCommand;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Save Books controller action.
 */
class Save extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Luvina_Test::management';

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var SaveCommand
     */
    private $saveCommand;

    /**
     * @var BooksInterfaceFactory
     */
    private $entityDataFactory;

    /**
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param SaveCommand $saveCommand
     * @param BooksInterfaceFactory $entityDataFactory
     */
    public function __construct(
        Context                $context,
        DataPersistorInterface $dataPersistor,
        SaveCommand            $saveCommand,
        BooksInterfaceFactory  $entityDataFactory
    )
    {
        parent::__construct($context);
        $this->dataPersistor = $dataPersistor;
        $this->saveCommand = $saveCommand;
        $this->entityDataFactory = $entityDataFactory;
    }

    /**
     * Save Books Action.
     *
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $params = $this->getRequest()->getParams();

        try {
            /** @var BooksInterface|DataObject $entityModel */
            $entityModel = $this->entityDataFactory->create();
            $entityModel->addData($params['general']);
            $this->saveCommand->execute($entityModel);
            $this->messageManager->addSuccessMessage(
                __('The Books data was saved successfully')
            );
            $this->dataPersistor->clear('entity');
        } catch (CouldNotSaveException $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
            $this->dataPersistor->set('entity', $params);

            return $resultRedirect->setPath('*/*/edit', [
                BooksInterface::BOOKS_ID => $this->getRequest()->getParam(BooksInterface::BOOKS_ID)
            ]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
