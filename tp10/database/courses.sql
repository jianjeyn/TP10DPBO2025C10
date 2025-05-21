CREATE DATABASE courses;
USE courses;

-- Instructors table
CREATE TABLE instructor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    specialization VARCHAR(100) NOT NULL
);

-- Courses table with a foreign key to instructor
CREATE TABLE course (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    credits INT NOT NULL,
    instructor_id INT NOT NULL,
    FOREIGN KEY (instructor_id) REFERENCES instructor(id)
);

-- Students table
CREATE TABLE student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    registration_date DATE NOT NULL
);

-- Enrollment table to manage the many-to-many relationship between students and courses
CREATE TABLE enrollment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    enrollment_date DATE NOT NULL,
    grade VARCHAR(2),
    FOREIGN KEY (student_id) REFERENCES student(id),
    FOREIGN KEY (course_id) REFERENCES course(id),
    UNIQUE KEY unique_enrollment (student_id, course_id)
);

-- Insert some sample data
INSERT INTO instructor (name, email, specialization) 
VALUES 
('Jihan Aqilah', 'jenaja@example.com', 'Computer Science'),
('Zayn', 'zayn@example.com', 'Mathematics'),
('Jibran Ali', 'jibranali@example.com', 'Physics');

INSERT INTO course (title, description, credits, instructor_id) 
VALUES 
('Introduction to Programming', 'A beginner-friendly course that introduces programming concepts using Python.', 3, 1),
('Advanced Web Development', 'Learn modern web development techniques including React and Node.js.', 4, 1),
('Calculus I', 'Introduction to differential and integral calculus.', 4, 2),
('Quantum Mechanics', 'Introduction to quantum physics and its applications.', 5, 3);

INSERT INTO student (name, email, registration_date) 
VALUES 
('Selena Gomez', 'selgom@example.com', '2024-01-15'),
('Justin Bieber', 'jb@example.com', '2024-02-20'),
('Olivia Rodrigo', 'olivia.rod@example.com', '2024-01-10'),
('Kendall Jenner', 'kendalljen@example.com', '2024-03-05');

INSERT INTO enrollment (student_id, course_id, enrollment_date, grade) 
VALUES 
(1, 1, '2024-02-01', 'A'),
(1, 3, '2024-02-01', 'B'),
(2, 2, '2024-03-01', 'A'),
(3, 1, '2024-02-15', 'B+'),
(3, 4, '2024-02-15', 'A-'),
(4, 3, '2024-03-10', NULL);