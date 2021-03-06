<?php

namespace Fuel\Migrations;

class Create_report_period
{
	public function up()
	{
		\DBUtil::create_table('report_period', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'from_date' => array('type' => 'date'),
			'to_date' => array('type' => 'date'),
			'acctg_method' => array('constraint' => 1, 'type' => 'char'),
			'description' => array('constraint' => 255, 'type' => 'varchar'),
			'report_type' => array('constraint' => 3, 'type' => 'char'),
            'fdesk_user' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),
            'deleted_at' => array('type' => 'datetime', 'null' => true),
            
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('report_period');
	}
}