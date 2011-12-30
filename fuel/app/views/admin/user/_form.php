<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Username', 'username'); ?>

			<div class="input">
				<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Email', 'email'); ?>

			<div class="input">
				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Last login', 'last_login'); ?>

			<div class="input">
				<?php echo Form::input('last_login', Input::post('last_login', isset($user) ? $user->last_login : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Ip address', 'ip_address'); ?>

			<div class="input">
				<?php echo Form::input('ip_address', Input::post('ip_address', isset($user) ? $user->ip_address : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Status', 'status'); ?>

			<div class="input">
				<?php echo Form::input('status', Input::post('status', isset($user) ? $user->status : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Activated', 'activated'); ?>

			<div class="input">
				<?php echo Form::input('activated', Input::post('activated', isset($user) ? $user->activated : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>