<h2>Viewing #<?php echo $user->id; ?></h2>

<p>
	<strong>Username:</strong>
	<?php echo $user->username; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $user->email; ?></p>
<p>
	<strong>Last login:</strong>
	<?php echo $user->last_login; ?></p>
<p>
	<strong>Ip address:</strong>
	<?php echo $user->ip_address; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $user->status; ?></p>
<p>
	<strong>Activated:</strong>
	<?php echo $user->activated; ?></p>

<?php echo Html::anchor('admin/user/edit/'.$user->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/user', 'Back'); ?>