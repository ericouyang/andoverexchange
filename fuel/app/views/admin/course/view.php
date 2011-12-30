<h2>Viewing #<?php echo $course->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $course->name; ?></p>
<p>
	<strong>Category:</strong>
	<?php echo $course->category; ?></p>
<p>
	<strong>Course id:</strong>
	<?php echo $course->course_id; ?></p>

<?php echo Html::anchor('admin/course/edit/'.$course->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/course', 'Back'); ?>