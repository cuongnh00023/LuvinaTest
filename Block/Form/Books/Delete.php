<?php

namespace Luvina\Test\Block\Form\Books;

use Luvina\Test\Api\Data\BooksInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Delete entity button.
 */
class Delete extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve Delete button settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return $this->wrapButtonSettings(
            'Delete',
            'delete',
            'deleteConfirm(\''
            . __('Are you sure you want to delete this books?')
            . '\', \'' . $this->getUrl(
                '*/*/delete',
                [BooksInterface::BOOKS_ID => $this->getBooksId()]
            ) . '\')',
            [],
            20
        );
    }
}
