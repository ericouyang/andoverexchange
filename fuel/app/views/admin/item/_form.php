<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($item) ? $item->name : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Type', 'type'); ?>

			<div class="input">
				<?php echo Form::input('type', Input::post('type', isset($item) ? $item->type : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Condition', 'condition'); ?>

			<div class="input">
				<?php echo Form::select('condition', Input::post('condition', isset($item) ? $item->condition : ''), array('New' => 'New', 'Excellent' => 'Excellent',  'Great' => 'Great', 'Good' => 'Good', 'Fair' => 'Fair'), array('class' => 'span6')); ?>
			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Price', 'price'); ?>

			<div class="input">
				<?php echo Form::input('price', Input::post('price', isset($item) ? $item->price : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::textarea('description', Input::post('description', isset($item) ? $item->description : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('User id', 'user_id'); ?>

			<div class="input">
				<?php echo Form::select('user_id', Input::post('user_id', isset($post) ? $post->user_id : $current_user->id), $users, array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>