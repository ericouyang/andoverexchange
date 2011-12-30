<h2>Welcome, <?php echo $user_metadata['first_name']; ?>!</h2>
<div class="row">
	<div class="span9">
	<?php echo Controller_Blocks::my_items(); ?>
	</div>
	<div class="span7">
		<?php echo Controller_Blocks::recent_items(); ?>
	</div>
</div>