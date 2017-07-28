<?php

use yii\db\Migration;

class m170728_081150_create_tb_d_tugas extends Migration
{
           const tb_name = 'tb_d_tugas';
    public function safeUp()
    {
   $this->createTable($this::tb_name,[
            'id_d_tugas' => $this->primaryKey(),
            'id_tugas' => $this->integer()->notNull(),
            'id_antrian' => $this->integer()->notNull(),
            
           'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
        
        ]);   
        
           $this->addForeignKey(
            'fk-tb_d_tugas-id_tugas',
            'tb_d_tugas',
            'id_tugas',
            'tb_tugas',
            'id_tugas',
            'CASCADE',
            'CASCADE'    
        );    $this->addForeignKey(
            'fk-tb_d_tugas-id_antrian',
            'tb_d_tugas',
            'id_antrian',
            'tb_antrian',
            'id_antrian',
            'CASCADE',
            'CASCADE'    
        );
    }

    public function safeDown()
    {
             $this->dropTable($this::tb_name);   
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170728_081150_create_tb_d_tugas cannot be reverted.\n";

        return false;
    }
    */
}
