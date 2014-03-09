<?php

class m140308_130306_users extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_user', array(
            'id' => 'pk',
            'username' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'email' => 'string NOT NULL',
            'name' => 'string NOT NULL',
            'surname' => 'string NOT NULL',
            'phone' => 'integer',
            'roles' => 'integer'
        ));
        $this->insert('tbl_user',array(
            'email'=>'admin@admin.com',
            'username' =>'admin',
            'password' => md5('admin'),
            'name' => 'admin',
            'surname' => 'admin'
        ));
	}

	public function down()
	{
        $this->dropTable('tbl_user');
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

    //$transaction=$this->getDbConnection()->beginTransaction();
    //try
    //{
    //$this->createTable('tbl_news', array(
    //'id' => 'pk',
    //'title' => 'string NOT NULL',
    //'content' => 'text',
    //));
    //$transaction->commit();
    //}
    //catch(Exception $e)
    //        {
    //            echo "Exception: ".$e->getMessage()."\n";
    //            $transaction->rollback();
    //            return false;
    //        }

}