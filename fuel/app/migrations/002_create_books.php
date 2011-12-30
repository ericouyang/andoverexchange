<?php

namespace Fuel\Migrations;

class Create_books
{
	public function up()
	{
		\DBUtil::create_table('books', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'type' => array('constraint' => 50, 'type' => 'varchar'),
			'format' => array('constraint' => 50, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('books');
	}
}