<?php

class m140308_171914_cart extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_cart', array(
            'id' => 'pk',
            'user_id' => 'integer NOT NULL',
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_cart');
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