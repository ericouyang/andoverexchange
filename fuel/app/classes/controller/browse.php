<?php

class Controller_Browse extends Controller_Base
{

	public function action_index()
	{
		$this->template->title = 'Browse';
		$this->template->content = View::forge('browse/index');
	}

	public function action_all()
	{
		$data['items'] = Model_Item::find('all');
		$this->template->title = 'Browse &raquo; All';
		$this->template->content = View::forge('browse/all', $data);
	}

	public function action_by_class()
	{
		$this->template->title = 'Browse &raquo; By class';
		$this->template->content = View::forge('browse/by_class');
	}

	public function action_by_teacher()
	{
		$this->template->title = 'Browse &raquo; By teacher';
		$this->template->content = View::forge('browse/by_teacher');
	}

	public function action_by_type()
	{
		$this->template->title = 'Browse &raquo; By type';
		$this->template->content = View::forge('browse/by_type');
	}

}
