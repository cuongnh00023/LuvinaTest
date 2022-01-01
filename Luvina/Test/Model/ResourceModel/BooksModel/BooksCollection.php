<?php

namespace Luvina\Test\Model\ResourceModel\BooksModel;

use Luvina\Test\Model\BooksModel;
use Luvina\Test\Model\ResourceModel\BooksResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class BooksCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'books_collection';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(BooksModel::class, BooksResource::class);
    }
}
