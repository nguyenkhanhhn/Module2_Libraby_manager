<?php


class Category
{
public $category_name;
public $category_id;
public function __construct($category_name)
{
    $this->category_name=$category_name;
}

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }
}