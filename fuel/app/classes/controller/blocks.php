<?php

class Controller_Blocks extends Controller_Base
{
	public static function recent_items()
	{
		$data['items'] = Model_Item::find('all', array('order_by' => array('updated_at' => 'desc'), 'limit' => 10));
		return View::forge('blocks/recent_items', $data);
	}
	
	public static function my_items()
	{
		$data['items'] = Model_Item::find('all', array('where' => array(array('user_id', Session::get('user_id'))), 'order_by' => array('updated_at' => 'desc')));
		return View::forge('blocks/my_items', $data);
	}
}