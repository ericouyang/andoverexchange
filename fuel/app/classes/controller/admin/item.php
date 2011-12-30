<?php
class Controller_Admin_Item extends Controller_Admin 
{

	public function before()
	{
		parent::before();
		
		$query = DB::select('id')->from('users')->select('username')->execute();
		
		//global variable of users table to be used by item views
		View::set_global('users', Arr::assoc_to_keyval($query, 'id', 'username'));
	}
	
	public function action_index()
	{
		$data['items'] = Model_Item::find('all');
		$this->template->title = "Items";
		$this->template->content = View::forge('admin/item/index', $data);

	}

	public function action_view($id = null)
	{
		$data['item'] = Model_Item::find($id);

		$this->template->title = "Item";
		$this->template->content = View::forge('admin/item/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Item::validate('create');
			
			if ($val->run())
			{
				$item = Model_Item::forge(array(
					'name' => Input::post('name'),
					'type' => Input::post('type'),
					'condition' => Input::post('condition'),
					'price' => Input::post('price'),
					'description' => Input::post('description'),
					'user_id' => Input::post('user_id'),
				));

				if ($item and $item->save())
				{
					Session::set_flash('success', 'Added item #'.$item->id.'.');

					Response::redirect('admin/item');
				}

				else
				{
					Session::set_flash('error', 'Could not save item.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Items";
		$this->template->content = View::forge('admin/item/create');

	}

	public function action_edit($id = null)
	{
		$item = Model_Item::find($id);
		$val = Model_Item::validate('edit');

		if ($val->run())
		{
			$item->name = Input::post('name');
			$item->type = Input::post('type');
			$item->condition = Input::post('condition');
			$item->price = Input::post('price');
			$item->description = Input::post('description');
			$item->user_id = Input::post('user_id');

			if ($item->save())
			{
				Session::set_flash('success', 'Updated item #' . $id);

				Response::redirect('admin/item');
			}

			else
			{
				Session::set_flash('error', 'Could not update item #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$item->name = $val->validated('name');
				$item->type = $val->validated('type');
				$item->condition = $val->validated('condition');
				$item->price = $val->validated('price');
				$item->description = $val->validated('description');
				$item->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('item', $item, false);
		}

		$this->template->title = "Items";
		$this->template->content = View::forge('admin/item/edit');

	}

	public function action_delete($id = null)
	{
		if ($item = Model_Item::find($id))
		{
			$item->delete();

			Session::set_flash('success', 'Deleted item #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete item #'.$id);
		}

		Response::redirect('admin/item');

	}


}