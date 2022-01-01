<?php

namespace Luvina\Test\Model;

use Luvina\Test\Model\ResourceModel\BooksResource;
use Magento\Framework\Model\AbstractModel;

class BooksModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'books_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(BooksResource::class);
    }
}
