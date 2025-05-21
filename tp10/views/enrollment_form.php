<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($enrollment) ? 'Edit Enrollment' : 'Add Enrollment'; ?></h2>
<form action="index.php?entity=enrollment&action=<?php echo isset($enrollment) ? 'update&id=' . $enrollment['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Student:</label>
        <select name="student_id" class="border p-2 w-full" required <?php echo isset($enrollment) ? 'disabled' : ''; ?>>
            <?php foreach ($students as $student): ?>
            <option value="<?php echo $student['id']; ?>" <?php echo isset($enrollment) && $enrollment['student_id'] == $student['id'] ? 'selected' : ''; ?>>
                <?php echo $student['name']; ?> (<?php echo $student['email']; ?>)
            </option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($enrollment)): ?>
        <input type="hidden" name="student_id" value="<?php echo $enrollment['student_id']; ?>">
        <?php endif; ?>
    </div>
    <div>
        <label class="block">Course:</label>
        <select name="course_id" class="border p-2 w-full" required <?php echo isset($enrollment) ? 'disabled' : ''; ?>>
            <?php foreach ($courses as $course): ?>
            <option value="<?php echo $course['id']; ?>" <?php echo isset($enrollment) && $enrollment['course_id'] == $course['id'] ? 'selected' : ''; ?>>
                <?php echo $course['title']; ?> (Instructor: <?php echo $course['instructor_name']; ?>)
            </option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($enrollment)): ?>
        <input type="hidden" name="course_id" value="<?php echo $enrollment['course_id']; ?>">
        <?php endif; ?>
    </div>
    <div>
        <label class="block">Enrollment Date:</label>
        <input type="date" name="enrollment_date" value="<?php echo isset($enrollment) ? $enrollment['enrollment_date'] : date('Y-m-d'); ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Grade (optional):</label>
        <select name="grade" class="border p-2 w-full">
            <option value="" <?php echo !isset($enrollment) || $enrollment['grade'] == '' ? 'selected' : ''; ?>>Not graded</option>
            <option value="A" <?php echo isset($enrollment) && $enrollment['grade'] == 'A' ? 'selected' : ''; ?>>A</option>
            <option value="B+" <?php echo isset($enrollment) && $enrollment['grade'] == 'B+' ? 'selected' : ''; ?>>B+</option>
            <option value="B" <?php echo isset($enrollment) && $enrollment['grade'] == 'B' ? 'selected' : ''; ?>>B</option>
            <option value="C+" <?php echo isset($enrollment) && $enrollment['grade'] == 'C+' ? 'selected' : ''; ?>>C+</option>
            <option value="C" <?php echo isset($enrollment) && $enrollment['grade'] == 'C' ? 'selected' : ''; ?>>C</option>
            <option value="D" <?php echo isset($enrollment) && $enrollment['grade'] == 'D' ? 'selected' : ''; ?>>D</option>
            <option value="F" <?php echo isset($enrollment) && $enrollment['grade'] == 'F' ? 'selected' : ''; ?>>F</option>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>