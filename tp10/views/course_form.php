<?php
require_once 'views/template/header.php';
?>

<h2 class="page-title"><?php echo isset($course) ? 'Edit Course' : 'Add Course'; ?></h2>
<form action="index.php?entity=course&action=<?php echo isset($course) ? 'update&id=' . $course['id'] : 'save'; ?>" method="POST">
    <div class="form-group">
        <label class="form-label">Title:</label>
        <input type="text" name="title" value="<?php echo isset($course) ? $course['title'] : ''; ?>" class="form-input" required>
    </div>
    <div class="form-group">
        <label class="form-label">Description:</label>
        <textarea name="description" class="form-input h-32" required><?php echo isset($course) ? $course['description'] : ''; ?></textarea>
    </div>
    <div class="form-group">
        <label class="form-label">Credits:</label>
        <input type="number" name="credits" value="<?php echo isset($course) ? $course['credits'] : ''; ?>" class="form-input" required min="1" max="6">
    </div>
    <div class="form-group">
        <label class="form-label">Instructor:</label>
        <select name="instructor_id" class="form-select" required>
            <?php foreach ($instructors as $instructor): ?>
            <option value="<?php echo $instructor['id']; ?>" <?php echo isset($course) && $course['instructor_id'] == $instructor['id'] ? 'selected' : ''; ?>>
                <?php echo $instructor['name']; ?> (<?php echo $instructor['specialization']; ?>)
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn-primary">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>