<?php
class Controller_Admin_User extends Controller_Admin 
{

	public function action_index()
	{
		$data['users'] = Model_User::find('all');
		$this->template->title = "Users";
		$this->template->content = View::forge('admin/user/index', $data);

	}

	public function action_view($id = null)
	{
		$data['user'] = Model_User::find($id);

		$this->template->title = "User";
		$this->template->content = View::forge('admin/user/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');
			
			if ($val->run())
			{
				$user = Model_User::forge(array(
					'username' => Input::post('username'),
					'email' => Input::post('email'),
					'last_login' => Input::post('last_login'),
					'ip_address' => Input::post('ip_address'),
					'status' => Input::post('status'),
					'activated' => Input::post('activated'),
				));

				if ($user and $user->save())
				{
					Session::set_flash('success', 'Added user #'.$user->id.'.');

					Response::redirect('admin/user');
				}

				else
				{
					Session::set_flash('error', 'Could not save user.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/user/create');

	}

	public function action_edit($id = null)
	{
		$user = Model_User::find($id);
		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->username = Input::post('username');
			$user->email = Input::post('email');
			$user->last_login = Input::post('last_login');
			$user->ip_address = Input::post('ip_address');
			$user->status = Input::post('status');
			$user->activated = Input::post('activated');

			if ($user->save())
			{
				Session::set_flash('success', 'Updated user #' . $id);

				Response::redirect('admin/user');
			}

			else
			{
				Session::set_flash('error', 'Could not update user #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->username = $val->validated('username');
				$user->email = $val->validated('email');
				$user->last_login = $val->validated('last_login');
				$user->ip_address = $val->validated('ip_address');
				$user->status = $val->validated('status');
				$user->activated = $val->validated('activated');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('admin/user/edit');

	}

	public function action_delete($id = null)
	{
		if ($user = Model_User::find($id))
		{
			$user->delete();

			Session::set_flash('success', 'Deleted user #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('admin/user');

	}


}