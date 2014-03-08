<?php

class m140308_130447_category extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_category', array(
            'id' => 'pk',
            'super_id' => 'integer',
            'name' => 'string NOT NULL',
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_category');
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