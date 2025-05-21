<?php
require_once 'views/template/header.php';
?>

<h2 class="page-title">Instructor List</h2>
<a href="index.php?entity=instructor&action=add" class="btn-primary inline-block mb-4">Add Instructor</a>
<table class="data-table">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Specialization</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($instructorList as $instructor): ?>
    <tr>
        <td><?php echo $instructor['name']; ?></td>
        <td><?php echo $instructor['email']; ?></td>
        <td><?php echo $instructor['specialization']; ?></td>
        <td>
            <a href="index.php?entity=instructor&action=edit&id=<?php echo $instructor['id']; ?>" class="link-blue">Edit</a>
            <a href="index.php?entity=instructor&action=delete&id=<?php echo $instructor['id']; ?>" class="link-red ml-2" onclick="return confirm('Are you sure? This will also delete any courses taught by this instructor.');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>