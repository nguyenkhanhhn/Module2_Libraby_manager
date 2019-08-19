<?php


class Studentdetai
{
    public $student_id;
    public $student_name;
    public $student_class;
    public $loan_day;
    public $pay_day;
    public $book_name;
    public $category_name;
    public function __construct($student_name,$student_class,$loan_day,$pay_day,$book_name,$category_name)
    {
        $this->student_name=$student_name;
        $this->student_class=$student_class;
        $this->loan_day=$loan_day;
        $this->pay_day=$pay_day;
        $this->book_name=$book_name;
        $this->category_name=$category_name;
    }

    /**
     * @return mixed
     */
    public function getPayDay()
    {
        return $this->pay_day;
    }

    /**
     * @return mixed
     */
    public function getLoanDay()
    {
        return $this->loan_day;
    }

    /**
     * @return mixed
     */
    public function getStudentClass()
    {
        return $this->student_class;
    }

    /**
     * @return mixed
     */
    public function getStudentName()
    {
        return $this->student_name;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->student_id;
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
    public function getBookName()
    {
        return $this->book_name;
    }

    /**
     * @param mixed $category_name
     */
    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;
    }
}