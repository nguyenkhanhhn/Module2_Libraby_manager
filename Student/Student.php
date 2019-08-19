<?php


class Student
{
public $student_id;
public $student_name;
public $student_class;
public $student_address;
public $student_bird_day;
public $student_phone;
public function __construct($student_name,$student_class,$student_address,$student_bird_day,$student_phone)
{
    $this->student_name=$student_name;
    $this->student_address=$student_address;
    $this->student_bird_day=$student_bird_day;
    $this->student_phone=$student_phone;
    $this->student_class=$student_class;
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
    public function getStudentName()
    {
        return $this->student_name;
    }

    /**
     * @return mixed
     */
    public function getStudentAddress()
    {
        return $this->student_address;
    }

    /**
     * @return mixed
     */
    public function getStudentBirdDay()
    {
        return $this->student_bird_day;
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
    public function getStudentPhone()
    {
        return $this->student_phone;
    }
}