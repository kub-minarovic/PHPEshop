<?php

class m140308_130447_category extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_category', array(
            'id' => 'pk',
            'super_id' => 'integer',
            'name' => 'string NOT NULL'
        ));
        
        $this->insert('tbl_category',array(
            'id' => 1,
            'super_id' => NULL,
            'name' => 'Shortboards'
        ));
        
        $this->insert('tbl_category',array(
            'id' => 2,
            'super_id' => NULL,
            'name' => 'Longboards'
        ));
        
        $this->insert('tbl_category',array(
            'id' => 3,
            'super_id' => NULL,
            'name' => 'Softboards'
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