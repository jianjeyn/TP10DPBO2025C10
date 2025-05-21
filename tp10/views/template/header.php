<!DOCTYPE html>
<html>
<head>
    <title>Online Course Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <nav class="nav-main">
        <h1 class="nav-title">Online Course Management System</h1>
        <ul class="nav-menu">
            <li><a href="index.php" class="nav-link <?php echo !isset($_GET['entity']) || $_GET['entity'] == 'dashboard' ? 'active' : ''; ?>">Home</a></li>
            <li><a href="index.php?entity=course" class="nav-link <?php echo isset($_GET['entity']) && $_GET['entity'] == 'course' ? 'active' : ''; ?>">Courses</a></li>
            <li><a href="index.php?entity=instructor" class="nav-link <?php echo isset($_GET['entity']) && $_GET['entity'] == 'instructor' ? 'active' : ''; ?>">Instructors</a></li>
            <li><a href="index.php?entity=student" class="nav-link <?php echo isset($_GET['entity']) && $_GET['entity'] == 'student' ? 'active' : ''; ?>">Students</a></li>
            <li><a href="index.php?entity=enrollment" class="nav-link <?php echo isset($_GET['entity']) && $_GET['entity'] == 'enrollment' ? 'active' : ''; ?>">Enrollments</a></li>
        </ul>
    </nav>
    <div class="container">