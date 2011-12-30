<h2>Editing Item</h2>
<br>

<?php echo render('admin\item/_form'); ?>
<p>
	<?php echo Html::anchor('admin/item/view/'.$item->id, 'View'); ?> |
	<?php echo Html::anchor('admin/item', 'Back'); ?></p>
