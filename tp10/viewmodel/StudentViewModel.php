<?php
require_once 'model/Student.php';
require_once 'model/Enrollment.php';

class StudentViewModel {
    private $student;
    private $enrollment;

    public function __construct() {
        $this->student = new Student();
        $this->enrollment = new Enrollment();
    }

    public function getStudentList() {
        return $this->student->getAll();
    }

    public function getStudentById($id) {
        return $this->student->getById($id);
    }

    public function addStudent($name, $email, $registration_date) {
        return $this->student->create($name, $email, $registration_date);
    }

    public function updateStudent($id, $name, $email, $registration_date) {
        return $this->student->update($id, $name, $email, $registration_date);
    }

    public function deleteStudent($id) {
        return $this->student->delete($id);
    }
    
    public function getStudentCourses($student_id) {
        return $this->enrollment->getEnrollmentsByStudentId($student_id);
    }
}
?>