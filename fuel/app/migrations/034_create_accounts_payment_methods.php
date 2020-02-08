<?php

namespace Fuel\Migrations;

class Create_accounts_payment_methods
{
	public function up()
	{
		\DBUtil::create_table('accounts_payment_methods', array(
            'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'code' => array('constraint' => 20, 'type' => 'varchar'),
            'name' => array('constraint' => 140, 'type' => 'varchar'),
			'is_default' => array('null' => true, 'type' => 'boolean'),
			'fdesk_user' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),            
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('accounts_payment_methods');
	}
}