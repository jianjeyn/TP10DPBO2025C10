<?php
require_once 'config/Database.php';

class Enrollment {
    private $conn;
    private $table = 'enrollment';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT e.*, s.name as student_name, c.title as course_title 
                 FROM " . $this->table . " e 
                 JOIN student s ON e.student_id = s.id 
                 JOIN course c ON e.course_id = c.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT e.*, s.name as student_name, c.title as course_title 
                 FROM " . $this->table . " e 
                 JOIN student s ON e.student_id = s.id 
                 JOIN course c ON e.course_id = c.id 
                 WHERE e.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($student_id, $course_id, $enrollment_date, $grade = null) {
        $query = "INSERT INTO " . $this->table . " (student_id, course_id, enrollment_date, grade) VALUES (:student_id, :course_id, :enrollment_date, :grade)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':enrollment_date', $enrollment_date);
        $stmt->bindParam(':grade', $grade);
        return $stmt->execute();
    }

    public function update($id, $student_id, $course_id, $enrollment_date, $grade) {
        $query = "UPDATE " . $this->table . " SET student_id = :student_id, course_id = :course_id, enrollment_date = :enrollment_date, grade = :grade WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':enrollment_date', $enrollment_date);
        $stmt->bindParam(':grade', $grade);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
    public function getEnrollmentsByStudentId($student_id) {
        $query = "SELECT e.*, c.title as course_title 
                 FROM " . $this->table . " e 
                 JOIN course c ON e.course_id = c.id 
                 WHERE e.student_id = :student_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getEnrollmentsByCourseId($course_id) {
        $query = "SELECT e.*, s.name as student_name 
                 FROM " . $this->table . " e 
                 JOIN student s ON e.student_id = s.id 
                 WHERE e.course_id = :course_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>