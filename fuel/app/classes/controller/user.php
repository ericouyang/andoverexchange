<?php

class Controller_User extends Controller_Base
{

	public function action_login()
	{
		if(Input::post('action') == 'login')
		{
			
			$username = Input::post('username');
			$password = Input::post('password');
			
			try
			{
				// log the user in
				$valid_login = Sentry::login($username, $password, true);

				if ($valid_login)
				{
					Session::set_flash('success', 'You are now logged in');
				}
				else
				{
					Session::set_flash('error', 'Your login details were incorrect');
				}

			}
			catch (SentryAuthException $e)
			{
				// issue logging in via Sentry - lets catch the sentry error thrown
				// store/set and display caught exceptions such as a suspended user with limit attempts feature.
				Session::set_flash('error', $e->getMessage());
			}
		}
		Response::redirect('/');
	}

	public function action_logout()
	{
		Sentry::logout();
		Response::redirect('_root_');
	}

	public function action_register()
	{
		
		if(Input::post('action') == 'register')
		{
			if(substr(Input::post('email'), -12) != "@andover.edu")
			{
				Session::set_flash('registration-error', 'The email you entered is not an andover.edu address');
			}
			else try
			{
				// create the user
				$hash = Sentry::user()->register(array(
					'email' => Input::post('email'),
					'username' => substr(Input::post('email'), 0, -12),
					'password' => Input::post('password'),
					'metadata' => array(
						'first_name' => Input::post('first_name'),
						'last_name' => Input::post('last_name'),
					)
				));

				if ($hash)
				{
					// the user was created
					$link = 'localhost/user/activate/'.$hash;
					self::send_activation_email(Input::post('email'), $link);
					Session::set_flash('success', 'Activation email was sent to '.Input::post('email').' link:'.$link);
					// send email with link to activate.
				}
				else
				{
					// something went wrong - shouldn't really happen
				}
			}
			catch (SentryUserException $e)
			{
				Session::set_flash('registration-error', $e->getMessage()); // catch errors such as user exists or bad fields
			}
		}
		Response::redirect('/');
	}
	
	public function action_activate()
	{
		// try to log a user in
		try
		{
			// log the user in
			$activate_user = Sentry::activate_user(Uri::segment(3), Uri::segment(4));

			if ($activate_user)
			{
				Session::set_flash('success', 'Your account is now active. You may now log in.');
			}
			else
			{
				// user was not activated
			}

		}
		catch (SentryAuthException $e)
		{
			// issue activating the user
			// store/set and display caught exceptions such as a suspended user with limit attempts feature.
			Session::set_flash('registration-error', $e->getMessage());
		}
		Response::redirect('/');
	}
	
	public function action_dashboard()
	{
		if (!Sentry::check())
		{
			Response::redirect('access_denied');
		}
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('user/dashboard');
	}
	
	public function action_reset_password()
	{
		if(Input::post('action') == 'reset_password')
		{
			try
			{
				// reset the password
				$reset = Sentry::reset_password(Input::post('username'), Input::post('password'));

				if ($reset)
				{
					$email = $reset['email'];
					$link = 'localhost/user/reset_password_confirm/'.$reset['link']; // adjust path as needed

					
					Session::set_flash('success', 'Your reset confirmation email has been sent to '.$email.$link);
					Response::redirect('/');
				}
				else
				{
					// password was not reset
				}

			}
			catch (SentryAuthException $e)
			{
				// issue activating the user
				// store/set and display caught exceptions such as a user not existing or user is disabled
				Session::set_flash('error', $e->getMessage());
			}
		}
		$this->template->title = 'Reset Password';
		$this->template->content = View::forge('user/reset_password');
	}
	
	public function action_reset_password_confirm()
	{
		try
		{
			// confirm password reset
			$confirm_reset = Sentry::reset_password_confirm(Uri::segment(3), Uri::segment(4));

			if ($confirm_reset)
			{
				Session::set_flash('success', 'Your password has been succesfully reset. You can now login with your new password.');
				Response::redirect('/');
			}
			else
			{
				Session::set_flash('error', 'There was an issue processing your password reset. Please try resetting your password again.');
				Response::redirect('/');
			}

		}
		catch (SentryAuthException $e)
		{
			// issue activating the user
			// store/set and display caught exceptions such as a user not existing or user is disabled
			Session::set_flash('error', $e->getMessage());
		}
	}
	
	public static function send_activation_email($email, $url)
	{
		// Create an instance
		$email = Email::forge();

		// Set the from address
		$email->from('test@email.me', 'Test');

		// Set the to address
		$email->to($email);

		// Set a subject
		$email->subject('AndoverExchange Activation Email');

		// And set the body.
		$email->body($url);
	}
}
