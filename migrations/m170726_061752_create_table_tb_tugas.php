<?php

use yii\db\Migration;

class m170726_061752_create_table_tb_tugas extends Migration
{
       const tb_name = 'tb_tugas';
    public function safeUp()
    {
        $this->createTable($this::tb_name,[
            'id_tugas' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'id_lokasi' => $this->integer()->notNull(),
            'start'=>$this->datetime(),
           'finish'=>$this->datetime(),
            
           'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
        
        ]);   
        
           $this->addForeignKey(
            'fk-tb_tugas-id_user',
            'tb_tugas',
            'id_user',
            'user',
            'id',
            'RESTRICT',
            'CASCADE'    
        );
                  
       
           $this->addForeignKey(
            'fk-tb_tugas-id_lokasi',
            'tb_tugas',
            'id_lokasi',
            'tb_m_lokasi',
            'id_lokasi',
            'RESTRICT',
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
        echo "m170726_061752_create_table_tb_tugas cannot be reverted.\n";

        return false;
    }
    */
}
