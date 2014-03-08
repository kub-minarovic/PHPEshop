<?php

class m140308_130458_wishlists extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_wishlist', array(
            'id' => 'pk',
            'user_id' => 'integer NOT NULL',
            'name' => 'string',
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_wishlist');
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