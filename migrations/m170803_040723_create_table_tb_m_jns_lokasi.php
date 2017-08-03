<?php

use yii\db\Migration;

class m170803_040723_create_table_tb_m_jns_lokasi extends Migration
{
     const tb_name = 'tb_m_jns_lokasi';
    public function safeUp()
    {
 $this->createTable($this::tb_name,[
            'id_jns_lokasi' => $this->primaryKey(),
            'nama_jns_lokasi' => $this->string()->notNull(),
           'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
        
        ]);   
      $this->addColumn('tb_m_lokasi', 'id_jns_lokasi', $this->integer()->Null());

    $this->addForeignKey(
            'fk-tb_m_lokasi-id_jns_lokasi',
            'tb_m_lokasi',
            'id_jns_lokasi',
            'tb_m_jns_lokasi',
            'id_jns_lokasi',
            'CASCADE',
            'CASCADE'    
        );
    }

    public function safeDown()
    {
        $this->dropForeignKeyForeignKey(
            'fk-tb_m_lokasi-id_jns_lokasi','tb_m_lokasi');
          $this->DropColumn('tb_m_lokasi', 'id_jns_lokasi');

        
               $this->dropTable($this::tb_name);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170803_040723_create_table_tb_m_jns_lokasi cannot be reverted.\n";

        return false;
    }
    */
}
