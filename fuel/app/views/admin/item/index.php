<h2>Listing Items</h2>
<br>
<?php if ($items): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Condition</th>
			<th>Price</th>
			<th>Description</th>
			<th>User id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($items as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->type; ?></td>
			<td><?php echo $item->condition; ?></td>
			<td><?php echo $item->price; ?></td>
			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->user_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/item/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/item/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/item/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Items.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/item/create', 'Add new Item', array('class' => 'btn success')); ?>

</p>
