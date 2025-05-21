<?php
require_once 'views/template/header.php';
?>

<h2 class="page-title">Student List</h2>
<a href="index.php?entity=student&action=add" class="btn-primary inline-block mb-4">Add Student</a>
<table class="data-table">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Registration Date</th>
        <th>Actions</th>
    </tr>
    <?php if (empty($studentList)): ?>
    <tr>
        <td colspan="4" class="text-center">No students found</td>
    </tr>
    <?php else: ?>
    <?php foreach ($studentList as $student): ?>
    <tr>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td><?php echo $student['registration_date']; ?></td>
        <td>
            <a href="index.php?entity=student&action=view&id=<?php echo $student['id']; ?>" class="link-blue">View Courses</a>
            <a href="index.php?entity=student&action=edit&id=<?php echo $student['id']; ?>" class="link-blue ml-2">Edit</a>
            <a href="index.php?entity=student&action=delete&id=<?php echo $student['id']; ?>" class="link-red ml-2" onclick="return confirm('Are you sure? This will also delete all enrollments for this student.');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>