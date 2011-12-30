<?php
class Controller_Admin_Course extends Controller_Admin 
{

	public function action_index()
	{
		$data['courses'] = Model_Course::find('all');
		$this->template->title = "Courses";
		$this->template->content = View::forge('admin/course/index', $data);

	}

	public function action_view($id = null)
	{
		$data['course'] = Model_Course::find($id);

		$this->template->title = "Course";
		$this->template->content = View::forge('admin/course/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Course::validate('create');
			
			if ($val->run())
			{
				$course = Model_Course::forge(array(
					'name' => Input::post('name'),
					'category' => Input::post('category'),
					'course_id' => Input::post('course_id'),
				));

				if ($course and $course->save())
				{
					Session::set_flash('success', 'Added course #'.$course->id.'.');

					Response::redirect('admin/course');
				}

				else
				{
					Session::set_flash('error', 'Could not save course.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Courses";
		$this->template->content = View::forge('admin/course/create');

	}

	public function action_edit($id = null)
	{
		$course = Model_Course::find($id);
		$val = Model_Course::validate('edit');

		if ($val->run())
		{
			$course->name = Input::post('name');
			$course->category = Input::post('category');
			$course->course_id = Input::post('course_id');

			if ($course->save())
			{
				Session::set_flash('success', 'Updated course #' . $id);

				Response::redirect('admin/course');
			}

			else
			{
				Session::set_flash('error', 'Could not update course #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$course->name = $val->validated('name');
				$course->category = $val->validated('category');
				$course->course_id = $val->validated('course_id');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('course', $course, false);
		}

		$this->template->title = "Courses";
		$this->template->content = View::forge('admin/course/edit');

	}

	public function action_delete($id = null)
	{
		if ($course = Model_Course::find($id))
		{
			$course->delete();

			Session::set_flash('success', 'Deleted course #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete course #'.$id);
		}

		Response::redirect('admin/course');

	}


}