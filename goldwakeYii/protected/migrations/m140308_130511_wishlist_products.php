<?php

class m140308_130511_wishlist_products extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_wishlist_product', array(
            'id' => 'pk',
            'wishlist_id' => 'integer NOT NULL',
            'product_id' => 'integer NOT NULL',
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_wishlist_product');
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