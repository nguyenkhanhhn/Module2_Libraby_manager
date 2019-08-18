<?php


class book
{
public $book_id;
public $book_name;
public $book_author;
public $book_producer;
public $book_price;
public $book_category_id;
public function __construct($book_name,$book_author,$book_producer,$book_price)
{
    $this->book_name=$book_name;
    $this->book_author=$book_author;
    $this->book_producer=$book_producer;
    $this->book_price=$book_price;
}

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getBookName()
    {
        return $this->book_name;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->book_id;
    }

    /**
     * @return mixed
     */
    public function getBookAuthor()
    {
        return $this->book_author;
    }

    /**
     * @return mixed
     */
    public function getBookPrice()
    {
        return $this->book_price;
    }

    /**
     * @return mixed
     */
    public function getBookProducer()
    {
        return $this->book_producer;
    }

    /**
     * @return mixed
     */
    public function getBookCategoryId()
    {
        return $this->book_category_id;
    }
}