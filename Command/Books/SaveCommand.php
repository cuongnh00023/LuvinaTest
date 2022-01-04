<?php

namespace Luvina\Test\Command\Books;

use Exception;
use Luvina\Test\Api\Data\BooksInterface;
use Luvina\Test\Model\BooksModel;
use Luvina\Test\Model\BooksModelFactory;
use Luvina\Test\Model\ResourceModel\BooksResource;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

/**
 * Save Books Command.
 */
class SaveCommand
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var BooksModelFactory
     */
    private $modelFactory;

    /**
     * @var BooksResource
     */
    private $resource;

    /**
     * @param LoggerInterface $logger
     * @param BooksModelFactory $modelFactory
     * @param BooksResource $resource
     */
    public function __construct(
        LoggerInterface   $logger,
        BooksModelFactory $modelFactory,
        BooksResource     $resource
    )
    {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * Save Books.
     *
     * @param BooksInterface $books
     *
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(BooksInterface $books): int
    {
        try {
            /** @var BooksModel $model */
            $model = $this->modelFactory->create();
            $model->addData($books->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(BooksInterface::BOOKS_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Books. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save Books.'));
        }

        return (int)$model->getData(BooksInterface::BOOKS_ID);
    }
}
