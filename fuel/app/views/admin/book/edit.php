<h2>Editing Book</h2>
<br>

<?php echo render('admin\book/_form'); ?>
<p>
	<?php echo Html::anchor('admin/book/view/'.$book->id, 'View'); ?> |
	<?php echo Html::anchor('admin/book', 'Back'); ?></p>
