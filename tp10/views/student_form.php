<?php
require_once 'views/template/header.php';
?>

<h2 class="page-title"><?php echo isset($student) ? 'Edit Student' : 'Add Student'; ?></h2>
<form action="index.php?entity=student&action=<?php echo isset($student) ? 'update&id=' . $student['id'] : 'save'; ?>" method="POST">
    <div class="form-group">
        <label class="form-label">Name:</label>
        <input type="text" name="name" value="<?php echo isset($student) ? $student['name'] : ''; ?>" class="form-input" required>
    </div>
    <div class="form-group">
        <label class="form-label">Email:</label>
        <input type="email" name="email" value="<?php echo isset($student) ? $student['email'] : ''; ?>" class="form-input" required>
    </div>
    <div class="form-group">
        <label class="form-label">Registration Date:</label>
        <input type="date" name="registration_date" value="<?php echo isset($student) ? $student['registration_date'] : date('Y-m-d'); ?>" class="form-input" required>
    </div>
    <button type="submit" class="btn-primary">Save</button>
    <a href="index.php?entity=student" class="btn-secondary ml-2">Cancel</a>
</form>

<?php
require_once 'views/template/footer.php';
?>