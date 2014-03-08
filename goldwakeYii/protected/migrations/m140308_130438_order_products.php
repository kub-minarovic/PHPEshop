<?php

class m140308_130438_order_products extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_order_product', array(
            'id' => 'pk',
            'product_id' => 'integer NOT NULL',
            'order_id' => 'integer NOT NULL',
            'product_price' => 'float NOT NULL',
            'quantity' => 'integer NOT NULL'
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_order_product');
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