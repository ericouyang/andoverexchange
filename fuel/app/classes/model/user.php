<?php
class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'email',
		'last_login',
		'ip_address',
		'status',
		'activated',
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
		$val->add_field('username', 'Username', 'required|max_length[50]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[50]');
		$val->add_field('last_login', 'Last Login', 'required|valid_string[numeric]');
		$val->add_field('ip_address', 'Ip Address', 'required|max_length[50]');
		$val->add_field('status', 'Status', 'required');
		$val->add_field('activated', 'Activated', 'required');

		return $val;
	}

}
