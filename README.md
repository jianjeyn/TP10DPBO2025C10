# Online Course Management System
A PHP web application built using the MVVM (Model-View-ViewModel) architecture pattern to manage courses, instructors, students, and enrollments.

## Janji
Saya Jihan Aqilah Hartono dengan NIM 2306827 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Design
![image](https://github.com/user-attachments/assets/6ecfa368-0207-4ee4-834c-467bcd4076c3)

## Database Schema Explanation for the Online Course Management System

### Data Flow and Relationships

1. **One-to-Many: Instructor to Courses**
   - One instructor can teach multiple courses
   - Each course is taught by exactly one instructor
   - The green line in the diagram shows this relationship via the `instructor_id` in the Course table

2. **Many-to-Many: Students and Courses**
   - One student can enroll in multiple courses
   - One course can have multiple students enrolled
   - This relationship is implemented through the Enrollment table, which serves as a junction table
   - The blue lines in the diagram show these relationships via the `student_id` and `course_id` in the Enrollment table

3. **Enrollment Data**
   - The Enrollment table not only connects students to courses but also stores enrollment-specific data
   - The `enrollment_date` tracks when a student enrolled in a particular course
   - The `grade` field allows for tracking student performance in each course

### Logic Flow

1. An instructor is created in the system with their personal and professional details
2. The instructor can offer one or more courses with detailed information
3. Students register in the system with their personal details
4. Students can enroll in multiple courses, creating enrollment records
5. Each enrollment record tracks when the student enrolled and their grade (once completed)

This schema supports the core operations of the application:
- Managing instructors and their specializations
- Creating and managing course offerings
- Student registration and management
- Course enrollment processing
- Grade tracking and academic record keeping

The yellow line in the diagram specifically indicates the relationship between the Course table and the Enrollment table, which is critical for tracking which students are enrolled in which courses.

## Project Structure

### Database
- MySQL/MariaDB database with 4 tables:
  - `instructor`: Stores information about course instructors
  - `course`: Stores course details with a foreign key to instructor
  - `student`: Stores student information
  - `enrollment`: Implements many-to-many relationship between students and courses

### Architecture Layers

#### Models
Basic data access layer with CRUD operations for each entity:
- `Instructor.php`
- `Course.php`
- `Student.php`
- `Enrollment.php`

#### ViewModels
Business logic layer that implements data binding between models and views:
- `InstructorViewModel.php`
- `CourseViewModel.php`
- `StudentViewModel.php`
- `EnrollmentViewModel.php`

#### Views
Presentation layer with clean, styled UI elements:
- Template components (header, footer)
- List views for each entity
- Form views for adding and editing entities
- Detail views (like student's enrolled courses)

### CSS Styling
Custom CSS with Navy & Grey color scheme:
- Located in `assets/css/styles.css`
- Uses CSS variables for consistent theming
- Responsive design elements
- Professional table and form styling

## Data Binding in MVVM

The application follows the MVVM pattern with:

1. **Models** handle raw database operations
2. **ViewModels** process and transform data
3. **Views** render the UI with the processed data
4. Data binding occurs through the ViewModel layer which acts as an intermediary

## Setup Instructions

1. Create a new MySQL database named 'courses'
2. Import the SQL file from database/courses.sql
3. Make sure the entire directory structure is copied correctly
4. Update database connection settings in Database.php if needed
5. Access through your web browser

## Screenrecord

https://drive.google.com/file/d/1guBGql_L4WYpQQFGrluyxomSyceBK4tv/view?usp=sharing
