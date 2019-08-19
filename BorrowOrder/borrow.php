<?php


class borrow
{
    public $borrow_id;
    public $loan_day;
    public $pay_day;

    public function __construct($loan_day,$pay_day)
    {
    $this->loan_day=$loan_day;
    $this->pay_day=$pay_day;
    }

    /**
     * @return mixed
     */
    public function getBorrowId()
    {
        return $this->borrow_id;
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
    public function getPayDay()
    {
        return $this->pay_day;
    }
}