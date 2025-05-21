<?php
require_once 'views/template/header.php';
?>

<div class="dashboard">
    <h2 class="page-title">Dashboard</h2>
    
    <div class="dashboard-stats">
        <div class="stat-card">
            <h3>Courses</h3>
            <p class="stat-number"><?php echo count($courseList); ?></p>
            <a href="index.php?entity=course" class="btn-primary mt-3">Manage Courses</a>
        </div>
        
        <div class="stat-card">
            <h3>Students</h3>
            <p class="stat-number"><?php echo count($studentList); ?></p>
            <a href="index.php?entity=student" class="btn-primary mt-3">Manage Students</a>
        </div>
        
        <div class="stat-card">
            <h3>Instructors</h3>
            <p class="stat-number"><?php echo count($instructorList); ?></p>
            <a href="index.php?entity=instructor" class="btn-primary mt-3">Manage Instructors</a>
        </div>
        
        <div class="stat-card">
            <h3>Enrollments</h3>
            <p class="stat-number"><?php echo count($enrollmentList); ?></p>
            <a href="index.php?entity=enrollment" class="btn-primary mt-3">Manage Enrollments</a>
        </div>
    </div>
    
    <div class="dashboard-content">
        <div class="recent-section">
            <h3>Recent Courses</h3>
            <table class="data-table">
                <tr>
                    <th>Title</th>
                    <th>Instructor</th>
                    <th>Credits</th>
                </tr>
                <?php foreach (array_slice($courseList, 0, 5) as $course): ?>
                <tr>
                    <td><?php echo $course['title']; ?></td>
                    <td><?php echo $course['instructor_name']; ?></td>
                    <td><?php echo $course['credits']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php if (count($courseList) > 5): ?>
                <a href="index.php?entity=course" class="link-blue">View all courses &rarr;</a>
            <?php endif; ?>
        </div>
        
        <div class="recent-section">
            <h3>Recent Students</h3>
            <table class="data-table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                </tr>
                <?php foreach (array_slice($studentList, 0, 5) as $student): ?>
                <tr>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <td><?php echo $student['registration_date']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php if (count($studentList) > 5): ?>
                <a href="index.php?entity=student" class="link-blue">View all students &rarr;</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>