<?php
require_once 'views/template/header.php';
?>

<h2 class="page-title">Courses for <?php echo $student['name']; ?></h2>
<div class="page-card">
    <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
    <p><strong>Registration Date:</strong> <?php echo $student['registration_date']; ?></p>
</div>

<div class="flex gap-4 mb-4">
    <a href="index.php?entity=enrollment&action=add" class="btn-primary">Enroll in New Course</a>
    <a href="index.php?entity=student" class="btn-secondary">Back to Students</a>
</div>

<?php if (empty($courses)): ?>
    <div class="alert alert-info">
        <p>This student is not enrolled in any courses yet.</p>
    </div>
<?php else: ?>
    <table class="data-table">
        <tr>
            <th>Course</th>
            <th>Enrollment Date</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($courses as $course): ?>
        <tr>
            <td><?php echo $course['course_title']; ?></td>
            <td><?php echo $course['enrollment_date']; ?></td>
            <td><?php echo $course['grade'] ? $course['grade'] : 'Not graded'; ?></td>
            <td>
                <a href="index.php?entity=enrollment&action=edit&id=<?php echo $course['id']; ?>" class="link-blue">Update Grade</a>
                <a href="index.php?entity=enrollment&action=delete&id=<?php echo $course['id']; ?>" class="link-red ml-2" onclick="return confirm('Are you sure you want to delete this enrollment?');">Unenroll</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php
require_once 'views/template/footer.php';
?>