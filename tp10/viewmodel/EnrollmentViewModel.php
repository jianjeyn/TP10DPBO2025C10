<?php
require_once 'model/Enrollment.php';
require_once 'model/Student.php';
require_once 'model/Course.php';

class EnrollmentViewModel {
    private $enrollment;
    private $student;
    private $course;

    public function __construct() {
        $this->enrollment = new Enrollment();
        $this->student = new Student();
        $this->course = new Course();
    }

    public function getEnrollmentList() {
        return $this->enrollment->getAll();
    }

    public function getEnrollmentById($id) {
        return $this->enrollment->getById($id);
    }
    
    public function getStudents() {
        return $this->student->getAll();
    }
    
    public function getCourses() {
        return $this->course->getAll();
    }

    public function addEnrollment($student_id, $course_id, $enrollment_date, $grade = null) {
        return $this->enrollment->create($student_id, $course_id, $enrollment_date, $grade);
    }

    public function updateEnrollment($id, $student_id, $course_id, $enrollment_date, $grade) {
        return $this->enrollment->update($id, $student_id, $course_id, $enrollment_date, $grade);
    }

    public function deleteEnrollment($id) {
        return $this->enrollment->delete($id);
    }
}
?>