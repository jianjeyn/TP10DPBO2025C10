<?php
require_once 'model/Course.php';
require_once 'model/Instructor.php';

class CourseViewModel {
    private $course;
    private $instructor;

    public function __construct() {
        $this->course = new Course();
        $this->instructor = new Instructor();
    }

    public function getCourseList() {
        return $this->course->getAll();
    }

    public function getCourseById($id) {
        return $this->course->getById($id);
    }
    
    public function getInstructors() {
        return $this->instructor->getAll();
    }

    public function addCourse($title, $description, $credits, $instructor_id) {
        return $this->course->create($title, $description, $credits, $instructor_id);
    }

    public function updateCourse($id, $title, $description, $credits, $instructor_id) {
        return $this->course->update($id, $title, $description, $credits, $instructor_id);
    }

    public function deleteCourse($id) {
        return $this->course->delete($id);
    }
}
?>