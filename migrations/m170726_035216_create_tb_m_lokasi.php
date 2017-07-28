<?php

use yii\db\Migration;

class m170726_035216_create_tb_m_lokasi extends Migration
{
    const tb_name = 'tb_m_lokasi';
    public function safeUp()
    {
 $this->createTable($this::tb_name,[
            'id_lokasi' => $this->primaryKey(),
            'nama_lokasi' => $this->string()->notNull(),
           'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
        
        ]);   
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
        echo "m170726_035216_create_tb_m_lokasi cannot be reverted.\n";

        return false;
    }
    */
}
