<?php

namespace Luvina\Test\Model\Data;

use Luvina\Test\Api\Data\BooksInterface;
use Magento\Framework\DataObject;

class BooksData extends DataObject implements BooksInterface
{
    /**
     * @inheritDoc
     */
    public function getBooksId(): ?int
    {
        return $this->getData(self::BOOKS_ID) === null ? null
            : (int)$this->getData(self::BOOKS_ID);
    }

    /**
     * @inheritDoc
     */
    public function setBooksId(?int $booksId): void
    {
        $this->setData(self::BOOKS_ID, $booksId);
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): ?string
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setTitle(?string $title): void
    {
        $this->setData(self::TITLE, $title);
    }

    /**
     * @inheritDoc
     */
    public function getAuthor(): ?string
    {
        return $this->getData(self::AUTHOR);
    }

    /**
     * @inheritDoc
     */
    public function setAuthor(?string $author): void
    {
        $this->setData(self::AUTHOR, $author);
    }

    /**
     * @inheritDoc
     */
    public function getYear(): ?int
    {
        return $this->getData(self::YEAR) === null ? null
            : (int)$this->getData(self::YEAR);
    }

    /**
     * @inheritDoc
     */
    public function setYear(?int $year): void
    {
        $this->setData(self::YEAR, $year);
    }

    /**
     * @inheritDoc
     */
    public function getPrice(): ?float
    {
        return $this->getData(self::PRICE) === null ? null
            : (float)$this->getData(self::PRICE);
    }

    /**
     * @inheritDoc
     */
    public function setPrice(?float $price): void
    {
        $this->setData(self::PRICE, $price);
    }
}
