<?php
require_once 'viewmodel/InstructorViewModel.php';
require_once 'viewmodel/CourseViewModel.php';
require_once 'viewmodel/StudentViewModel.php';
require_once 'viewmodel/EnrollmentViewModel.php';

// Create instances of all viewmodels for dashboard
$instructorViewModel = new InstructorViewModel();
$courseViewModel = new CourseViewModel();
$studentViewModel = new StudentViewModel();
$enrollmentViewModel = new EnrollmentViewModel();

// Get entity parameter or default to dashboard
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Handle Instructor Entity
if ($entity == 'instructor') {
    $viewModel = $instructorViewModel;
    
    if ($action == 'list') {
        $instructorList = $viewModel->getInstructorList();
        require_once 'views/instructor_list.php';
    } elseif ($action == 'add') {
        require_once 'views/instructor_form.php';
    } elseif ($action == 'edit') {
        $instructor = $viewModel->getInstructorById($_GET['id']);
        require_once 'views/instructor_form.php';
    } elseif ($action == 'save') {
        $viewModel->addInstructor($_POST['name'], $_POST['email'], $_POST['specialization']);
        header('Location: index.php?entity=instructor');
    } elseif ($action == 'update') {
        $viewModel->updateInstructor($_GET['id'], $_POST['name'], $_POST['email'], $_POST['specialization']);
        header('Location: index.php?entity=instructor');
    } elseif ($action == 'delete') {
        $viewModel->deleteInstructor($_GET['id']);
        header('Location: index.php?entity=instructor');
    }
} 
// Handle Course Entity
elseif ($entity == 'course') {
    $viewModel = $courseViewModel;
    
    if ($action == 'list') {
        $courseList = $viewModel->getCourseList();
        require_once 'views/course_list.php';
    } elseif ($action == 'add') {
        $instructors = $viewModel->getInstructors();
        require_once 'views/course_form.php';
    } elseif ($action == 'edit') {
        $course = $viewModel->getCourseById($_GET['id']);
        $instructors = $viewModel->getInstructors();
        require_once 'views/course_form.php';
    } elseif ($action == 'save') {
        $viewModel->addCourse($_POST['title'], $_POST['description'], $_POST['credits'], $_POST['instructor_id']);
        header('Location: index.php?entity=course');
    } elseif ($action == 'update') {
        $viewModel->updateCourse($_GET['id'], $_POST['title'], $_POST['description'], $_POST['credits'], $_POST['instructor_id']);
        header('Location: index.php?entity=course');
    } elseif ($action == 'delete') {
        $viewModel->deleteCourse($_GET['id']);
        header('Location: index.php?entity=course');
    }
} 
// Handle Student Entity
elseif ($entity == 'student') {
    $viewModel = $studentViewModel;
    
    if ($action == 'list') {
        $studentList = $viewModel->getStudentList();
        require_once 'views/student_list.php';
    } elseif ($action == 'add') {
        require_once 'views/student_form.php';
    } elseif ($action == 'edit') {
        $student = $viewModel->getStudentById($_GET['id']);
        require_once 'views/student_form.php';
    } elseif ($action == 'view') {
        $student = $viewModel->getStudentById($_GET['id']);
        $courses = $viewModel->getStudentCourses($_GET['id']);
        require_once 'views/student_courses.php';
    } elseif ($action == 'save') {
        $viewModel->addStudent($_POST['name'], $_POST['email'], $_POST['registration_date']);
        header('Location: index.php?entity=student');
    } elseif ($action == 'update') {
        $viewModel->updateStudent($_GET['id'], $_POST['name'], $_POST['email'], $_POST['registration_date']);
        header('Location: index.php?entity=student');
    } elseif ($action == 'delete') {
        $viewModel->deleteStudent($_GET['id']);
        header('Location: index.php?entity=student');
    }
} 
// Handle Enrollment Entity
elseif ($entity == 'enrollment') {
    $viewModel = $enrollmentViewModel;
    
    if ($action == 'list') {
        $enrollmentList = $viewModel->getEnrollmentList();
        require_once 'views/enrollment_list.php';
    } elseif ($action == 'add') {
        $students = $viewModel->getStudents();
        $courses = $viewModel->getCourses();
        require_once 'views/enrollment_form.php';
    } elseif ($action == 'edit') {
        $enrollment = $viewModel->getEnrollmentById($_GET['id']);
        $students = $viewModel->getStudents();
        $courses = $viewModel->getCourses();
        require_once 'views/enrollment_form.php';
    } elseif ($action == 'save') {
        $viewModel->addEnrollment($_POST['student_id'], $_POST['course_id'], $_POST['enrollment_date'], $_POST['grade']);
        header('Location: index.php?entity=enrollment');
    } elseif ($action == 'update') {
        $viewModel->updateEnrollment($_GET['id'], $_POST['student_id'], $_POST['course_id'], $_POST['enrollment_date'], $_POST['grade']);
        header('Location: index.php?entity=enrollment');
    } elseif ($action == 'delete') {
        $viewModel->deleteEnrollment($_GET['id']);
        header('Location: index.php?entity=enrollment');
    }
}
// Dashboard (default landing page)
else if ($entity == 'dashboard') {
    // Get data for dashboard
    $courseList = $courseViewModel->getCourseList();
    $studentList = $studentViewModel->getStudentList();
    $instructorList = $instructorViewModel->getInstructorList();
    $enrollmentList = $enrollmentViewModel->getEnrollmentList();
    
    require_once 'views/dashboard.php';
}
?>