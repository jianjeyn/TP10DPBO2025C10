<?php
require_once 'views/template/header.php';
?>

<h2 class="page-title">Course List</h2>
<a href="index.php?entity=course&action=add" class="btn-primary inline-block mb-4">Add Course</a>
<table class="data-table">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Credits</th>
        <th>Instructor</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($courseList as $course): ?>
    <tr>
        <td><?php echo $course['title']; ?></td>
        <td><?php echo substr($course['description'], 0, 100) . (strlen($course['description']) > 100 ? '...' : ''); ?></td>
        <td><?php echo $course['credits']; ?></td>
        <td><?php echo $course['instructor_name']; ?></td>
        <td>
            <a href="index.php?entity=course&action=edit&id=<?php echo $course['id']; ?>" class="link-blue">Edit</a>
            <a href="index.php?entity=course&action=delete&id=<?php echo $course['id']; ?>" class="link-red ml-2" onclick="return confirm('Are you sure? This will also delete all enrollments for this course.');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>