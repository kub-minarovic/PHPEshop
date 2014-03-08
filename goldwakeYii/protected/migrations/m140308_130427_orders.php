<?php

class m140308_130427_orders extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_order', array(
            'id' => 'pk',
            'user_id' => 'integer NOT NULL',
            'user_name' => 'string NOT NULL',
            'user_surname' => 'string NOT NULL',
            'user_email' => 'string NOT NULL',
            'user_phone' => 'string NOT NULL',
            'billing_address' => 'string NOT NULL',
            'shipping_address' => 'string',
            'status' => 'integer'
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_order');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}