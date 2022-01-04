<?php

namespace Luvina\Test\Command\Books;

use Exception;
use Luvina\Test\Api\Data\BooksInterface;
use Luvina\Test\Model\BooksModel;
use Luvina\Test\Model\BooksModelFactory;
use Luvina\Test\Model\ResourceModel\BooksResource;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;

/**
 * Delete Books by id Command.
 */
class DeleteByIdCommand
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
     * Delete Books.
     *
     * @param int $entityId
     *
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $entityId): void
    {
        try {
            /** @var BooksModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, BooksInterface::BOOKS_ID);

            if (!$model->getData(BooksInterface::BOOKS_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Books with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Books. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Books.'));
        }
    }
}
