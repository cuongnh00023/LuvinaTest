<?php

namespace Luvina\Test\Model\ResourceModel;

use Luvina\Test\Api\Data\BooksInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class BooksResource extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'books_resource_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('books', BooksInterface::BOOKS_ID);
        $this->_useIsObjectNew = true;
    }
}
