<h2>Viewing #<?php echo $item->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $item->name; ?></p>
<p>
	<strong>Type:</strong>
	<?php echo $item->type; ?></p>
<p>
	<strong>Condition:</strong>
	<?php echo $item->condition; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $item->price; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $item->description; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $item->user_id; ?></p>

<?php echo Html::anchor('admin/item/edit/'.$item->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/item', 'Back'); ?>