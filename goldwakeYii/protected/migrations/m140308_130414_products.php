<?php

class m140308_130414_products extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_product', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'category_id' => 'integer',
            'price' => 'float NOT NULL'
        ));
        
        // Category #1: Shortboards
        $this->insert('tbl_product', array(
            'id' => 1,
            'name' => "Bic Surf DURA-TEC 6'7",
            'category_id' => 1,
            'price' => '229.94'
        ));
        $this->insert('tbl_product', array(
            'id' => 2,
            'name' => "Bic Surf DURA-TEC 7'0 EGG",
            'category_id' => 1,
            'price' => '239.95'
        ));
        $this->insert('tbl_product', array(
            'id' => 3,
            'name' => "Bic Surf DURA-TEC 5'10 Fish",
            'category_id' => 1,
            'price' => '199.94'
        ));
        
        // Category #2: Longboards
        $this->insert('tbl_product', array(
            'id' => 4,
            'name' => "Bic Surf DURA-TEC 9'4 Super Magnum",
            'category_id' => 2,
            'price' => '409.94'
        ));
        $this->insert('tbl_product', array(
            'id' => 5,
            'name' => "Bic Surf Bic 9'4 Nat Young",
            'category_id' => 2,
            'price' => '478.99'
        ));
        $this->insert('tbl_product', array(
            'id' => 6,
            'name' => "Circle One 10' Heritage Custom",
            'category_id' => 2,
            'price' => '480.00'
        ));
        
        // Category #3: Softboards
        $this->insert('tbl_product', array(
            'id' => 7,
            'name' => "Bic Surf 5'6 G Board Kid Twin Fin",
            'category_id' => 3,
            'price' => '249.00'
        ));
        $this->insert('tbl_product', array(
            'id' => 8,
            'name' => "Bic Surf 6'6 G Board Classic",
            'category_id' => 3,
            'price' => '298.99'
        ));
        $this->insert('tbl_product', array(
            'id' => 9,
            'name' => "Soft Surfboards 6'0 Beginner",
            'category_id' => 3,
            'price' => '119.00'
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