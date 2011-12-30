<?php
class Model_Book extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'type',
		'format',
		'description',
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
		$val->add_field('format', 'Format', 'required|max_length[50]');
		$val->add_field('description', 'Description', 'required');

		return $val;
	}

}
