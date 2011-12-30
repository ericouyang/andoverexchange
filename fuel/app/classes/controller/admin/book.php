<?php
class Controller_Admin_Book extends Controller_Admin 
{

	public function action_index()
	{
		$data['books'] = Model_Book::find('all');
		$this->template->title = "Books";
		$this->template->content = View::forge('admin/book/index', $data);

	}

	public function action_view($id = null)
	{
		$data['book'] = Model_Book::find($id);

		$this->template->title = "Book";
		$this->template->content = View::forge('admin/book/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Book::validate('create');
			
			if ($val->run())
			{
				$book = Model_Book::forge(array(
					'name' => Input::post('name'),
					'type' => Input::post('type'),
					'format' => Input::post('format'),
					'description' => Input::post('description'),
				));

				if ($book and $book->save())
				{
					Session::set_flash('success', 'Added book #'.$book->id.'.');

					Response::redirect('admin/book');
				}

				else
				{
					Session::set_flash('error', 'Could not save book.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Books";
		$this->template->content = View::forge('admin/book/create');

	}

	public function action_edit($id = null)
	{
		$book = Model_Book::find($id);
		$val = Model_Book::validate('edit');

		if ($val->run())
		{
			$book->name = Input::post('name');
			$book->type = Input::post('type');
			$book->format = Input::post('format');
			$book->description = Input::post('description');

			if ($book->save())
			{
				Session::set_flash('success', 'Updated book #' . $id);

				Response::redirect('admin/book');
			}

			else
			{
				Session::set_flash('error', 'Could not update book #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$book->name = $val->validated('name');
				$book->type = $val->validated('type');
				$book->format = $val->validated('format');
				$book->description = $val->validated('description');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('book', $book, false);
		}

		$this->template->title = "Books";
		$this->template->content = View::forge('admin/book/edit');

	}

	public function action_delete($id = null)
	{
		if ($book = Model_Book::find($id))
		{
			$book->delete();

			Session::set_flash('success', 'Deleted book #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete book #'.$id);
		}

		Response::redirect('admin/book');

	}


}