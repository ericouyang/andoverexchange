<h3>Recent Items</h3>
<?php if ($items): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Condition</th>
			<th>Price</th>
			<th>Seller</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($items as $item): ?>		<tr>
			<?php $seller_metadata = Sentry::user((int)$item->user_id)->get('metadata'); ?>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->type; ?></td>
			<td><?php echo $item->condition; ?></td>
			<td>$<?php echo $item->price; ?></td>
			<td><?php echo $seller_metadata['first_name'].' '.$seller_metadata['last_name']; ?></td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Items.</p>

<?php endif; ?><p>