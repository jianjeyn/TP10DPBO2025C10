<?php
require_once 'views/template/header.php';
?>

<h2 class="page-title">Enrollment List</h2>
<a href="index.php?entity=enrollment&action=add" class="btn-primary inline-block mb-4">Add Enrollment</a>
<table class="data-table">
    <tr>
        <th>Student</th>
        <th>Course</th>
        <th>Enrollment Date</th>
        <th>Grade</th>
        <th>Actions</th>
    </tr>
    <?php if (empty($enrollmentList)): ?>
    <tr>
        <td colspan="5" class="text-center">No enrollments found</td>
    </tr>
    <?php else: ?>
    <?php foreach ($enrollmentList as $enrollment): ?>
    <tr>
        <td><?php echo $enrollment['student_name']; ?></td>
        <td><?php echo $enrollment['course_title']; ?></td>
        <td><?php echo $enrollment['enrollment_date']; ?></td>
        <td><?php echo $enrollment['grade'] ? $enrollment['grade'] : 'Not graded'; ?></td>
        <td>
            <a href="index.php?entity=enrollment&action=edit&id=<?php echo $enrollment['id']; ?>" class="link-blue">Edit</a>
            <a href="index.php?entity=enrollment&action=delete&id=<?php echo $enrollment['id']; ?>" class="link-red ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>