<h2>Viewing #<?php echo $book->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $book->name; ?></p>
<p>
	<strong>Type:</strong>
	<?php echo $book->type; ?></p>
<p>
	<strong>Format:</strong>
	<?php echo $book->format; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $book->description; ?></p>

<?php echo Html::anchor('admin/book/edit/'.$book->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/book', 'Back'); ?>