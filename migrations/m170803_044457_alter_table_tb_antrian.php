<?php

use yii\db\Migration;

class m170803_044457_alter_table_tb_antrian extends Migration
{
    public function safeUp()
    {
         $this->addColumn('tb_antrian', 'id_jns_lokasi', $this->integer()->Null());
          $this->addForeignKey(
            'fk-tb_antrian-id_jns_lokasi',
            'tb_antrian',
            'id_jns_lokasi',
            'tb_m_jns_lokasi',
            'id_jns_lokasi',
            'CASCADE',
            'CASCADE'    
        );

    }

    public function safeDown()
    {
          $this->dropForeignKey(
            'fk-tb_antrian-id_jns_lokasi',
            'tb_antrian');
          $this->dropColumn('tb_antrian', 'id_jns_lokasi');
         
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170803_044457_alter_table_tb_antrian cannot be reverted.\n";

        return false;
    }
    */
}
