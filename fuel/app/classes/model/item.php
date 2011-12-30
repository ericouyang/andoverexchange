<?php
class Model_Item extends \Orm\Model
{
	protected static $_has_one = array('user');
	
	protected static $_properties = array(
		'id',
		'name',
		'type',
		'condition',
		'price',
		'description',
		'user_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[50]');
		$val->add_field('type', 'Type', 'required|max_length[50]');
		$val->add_field('condition', 'Condition', 'required|max_length[50]');
		$val->add_field('price', 'Price', 'required|valid_string[numeric]');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');

		return $val;
	}

}
