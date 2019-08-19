<?php
include_once "../DBconnect.php";
include_once "Student.php";
include_once "Studentdetai.php";

class Studentdb
{
    public $conn;

    public function __construct()
    {
        $db = new DBconnect();
        $this->conn = $db->connect();
    }

    public function getstudent()
    {
        $sql = "SELECT * FROM `students`";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
        $mysql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $mysql->fetchAll();
        $arr = [];
        foreach ($data as $value) {
            $student = new Student($value['student_name'], $value['student_class'], $value['student_address'], $value['student_bird_day'], $value['student_phone']);
            $student->student_id = $value['student_id'];
            array_push($arr, $student);
        }
        return $arr;
    }

    public function creatStudent($obj)
    {
        $student_name = $obj->getStudentName();
        $student_class = $obj->getStudentClass();
        $student_address = $obj->getStudentAddress();
        $student_bird_day = $obj->getStudentBirdDay();
        $student_phone = $obj->getStudentPhone();
        $sql = "INSERT INTO `students`(`student_name`, `student_class`, `student_address`, `student_bird_day`, `student_phone`) 
                VALUES ('$student_name','$student_class','$student_address','$student_bird_day','$student_phone')";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function DeleteStudent($id)
    {
        $sql = "DELETE FROM `students` WHERE student_id=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function UpdateStudent($id, $student_name, $student_class, $student_address, $student_bird_day, $student_phone)
    {
        $sql = "UPDATE `students` SET `student_name`='$student_name',`student_class`='$student_class',`student_address`='$student_address',`student_bird_day`='$student_bird_day',`student_phone`='$student_phone' 
                WHERE `student_id`=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM `students` WHERE student_id=$id";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
        $mysql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $mysql->fetch();
        if ($data) {
            $newstudent = new Student($data['student_name'], $data['student_class'], $data['student_address'], $data['student_bird_day'], $data['student_phone']);
            $newstudent->student_id = $data['student_id'];
            return $newstudent;
        } else {
            echo "Người dùng không tồn tại";
        }
    }

    public function detail($id)
    {
        $sql = "SELECT students.student_name,students.student_class,BorrowOrder.loan_day,BorrowOrder.pay_day,book.book_name,categorys.category_name FROM students JOIN BorrowOrder ON students.student_id=BorrowOrder.student_id JOIN orderdetail ON orderdetail.borrow_id=BorrowOrder.borrow_id JOIN book ON orderdetail.book_id=book.book_id JOIN categorys ON categorys.category_id=book.category_id WHERE students.student_id='$id'
";
        $mysql = $this->conn->prepare($sql);
        $mysql->execute();
        $mysql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $mysql->fetchAll();

        $arr = [];
        foreach ($data as $value) {
            $newStudentdetail= new Studentdetai($value['student_name'],$value['student_class'],
                $value['loan_day'],$value['pay_day'],$value['book_name'],$value['category_name']);
            $newStudentdetail->student_id = $value['student_id'];
            array_push($arr, $newStudentdetail);
        }

        return $arr;
    }
}