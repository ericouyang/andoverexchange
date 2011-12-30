<h2>Listing Books</h2>
<br>
<?php if ($books): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Format</th>
			<th>Description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($books as $book): ?>		<tr>

			<td><?php echo $book->name; ?></td>
			<td><?php echo $book->type; ?></td>
			<td><?php echo $book->format; ?></td>
			<td><?php echo $book->description; ?></td>
			<td>
				<?php echo Html::anchor('admin/book/view/'.$book->id, 'View'); ?> |
				<?php echo Html::anchor('admin/book/edit/'.$book->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/book/delete/'.$book->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Books.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/book/create', 'Add new Book', array('class' => 'btn success')); ?>

</p>
