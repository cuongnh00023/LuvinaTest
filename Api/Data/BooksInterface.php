<?php

namespace Luvina\Test\Api\Data;

interface BooksInterface
{
    /**
     * String constants for property names
     */
    const BOOKS_ID = "books_id";
    const TITLE = "title";
    const AUTHOR = "author";
    const YEAR = "year";
    const PRICE = "price";

    /**
     * Getter for BooksId.
     *
     * @return int|null
     */
    public function getBooksId(): ?int;

    /**
     * Setter for BooksId.
     *
     * @param int|null $booksId
     *
     * @return void
     */
    public function setBooksId(?int $booksId): void;

    /**
     * Getter for Title.
     *
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * Setter for Title.
     *
     * @param string|null $title
     *
     * @return void
     */
    public function setTitle(?string $title): void;

    /**
     * Getter for Author.
     *
     * @return string|null
     */
    public function getAuthor(): ?string;

    /**
     * Setter for Author.
     *
     * @param string|null $author
     *
     * @return void
     */
    public function setAuthor(?string $author): void;

    /**
     * Getter for Year.
     *
     * @return int|null
     */
    public function getYear(): ?int;

    /**
     * Setter for Year.
     *
     * @param int|null $year
     *
     * @return void
     */
    public function setYear(?int $year): void;

    /**
     * Getter for Price.
     *
     * @return float|null
     */
    public function getPrice(): ?float;

    /**
     * Setter for Price.
     *
     * @param float|null $price
     *
     * @return void
     */
    public function setPrice(?float $price): void;
}
