<h2>Editing Course</h2>
<br>

<?php echo render('admin\course/_form'); ?>
<p>
	<?php echo Html::anchor('admin/course/view/'.$course->id, 'View'); ?> |
	<?php echo Html::anchor('admin/course', 'Back'); ?></p>
