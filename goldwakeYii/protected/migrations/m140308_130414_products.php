<?php

class m140308_130414_products extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_product', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'category_id' => 'integer',
            'price' => 'float NOT NULL',
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_product');
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