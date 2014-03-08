<?php

class m140308_182705_cart_lineitem extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_cart_line_item', array(
            'id' => 'pk',
            'cart_id' => 'integer NOT NULL',
            'product_id' => 'integer NOT NULL'

        ));
	}

	public function down()
	{
        $this->dropTable('tbl_cart_line_item');
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