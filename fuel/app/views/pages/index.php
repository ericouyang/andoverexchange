<div class="row">
	<div class="span9">
	<h2>Hey there!</h2>
	<p>AndoverExchange(beta) is a student-built platform to faciliate trade and reuse on campus. The idea is to help students save money and to promote a greener campus through reuse of items.</p>
	<p>Students and faculty can list items, such as textbooks, for sale to other campus members. When someone wants to purchase an item, requests are sent to the seller and a time/place is arranged for pickup</p>
	<p>This site does not deal with any finances, rather all transactions are done in person.</p>
	<p>To get started, sign up for an account to the right. Let us know what you think!</p>
	<?php echo Controller_Blocks::recent_items(); ?>
	</div>
	<div class="span7">
		<h3>Register</h3>
		<p>Please note that you must have an andover.edu email address to sign up</p>
		<?php if (Session::get_flash('registration-error')): ?>
			<div class="alert-message error">
				<p>
				<?php echo Session::get_flash('registration-error'); ?>
				</p>
			</div>
		<?php endif; ?>
		<form action="/user/register" method="post">
			<input name="action" value="register" type="hidden">
			<div class="clearfix">
				<label for="email">Email:</label>
				<div class="input">
					<input name="email" placeholder="me@example.com" type="email" pattern="^[_A-Za-z0-9-]+@andover.edu$" required="true">
				</div>
			</div>
			<div class="clearfix">
				<label for="first_name">First Name:</label>
				<div class="input">
					<input name="first_name" type="text" required="true">
				</div>
			</div>
			<div class="clearfix">
				<label for="last_name">Last Name:</label>
				<div class="input">
					<input name="last_name" type="text" required="true">
				</div>
			</div>
			<div class="clearfix">
				<label for="password">Password:</label>
				<div class="input">
					<input name="password" placeholder="" type="password" required="true">
				</div>
			</div>
			<div class="clearfix">
				<div class="input">
					<input class="btn primary submit-button" type="submit" value="Register">  
				</div>
			</div>
		</form>
	</div>
</div>