<h2>Reset password</h2>
<form action="/user/reset_password" method="post">
	<input name="action" value="reset_password" type="hidden">
	<div class="clearfix">
		<label for="username">Username:</label>
		<div class="input">
			<input class="xlarge" name="username" type="text" required="true">
			<span class="help-block">This is your PANet username</span>
		</div>
	</div>
	<div class="clearfix">
		<label for="password">Password:</label>
		<div class="input">
			<input class="xlarge" name="password" placeholder="" type="password" required="true">
		</div>
	</div>
	<div class="clearfix">
		<div class="input">
			<input class="btn primary submit-button" type="submit" value="Reset Password">
		</div>
	</div>
</form>