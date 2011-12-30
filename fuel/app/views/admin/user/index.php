<h2>Listing Users</h2>
<br>
<?php if ($users): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Last login</th>
			<th>Ip address</th>
			<th>Status</th>
			<th>Activated</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo date('n/d/Y H:i',$user->last_login); ?></td>
			<td><?php echo $user->ip_address; ?></td>
			<td><?php echo $user->status; ?></td>
			<td><?php echo $user->activated; ?></td>
			<td>
				<?php echo Html::anchor('admin/user/view/'.$user->id, 'View'); ?> |
				<?php echo Html::anchor('admin/user/edit/'.$user->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/user/delete/'.$user->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/user/create', 'Add new User', array('class' => 'btn success')); ?>

</p>
