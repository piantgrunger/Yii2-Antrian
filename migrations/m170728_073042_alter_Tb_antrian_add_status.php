<?php

use yii\db\Migration;

class m170728_073042_alter_Tb_antrian_add_status extends Migration
{
    public function safeUp()
    {
       $this->addColumn('tb_antrian', 'stat_ambil', $this->integer()->notNull()->defaultValue(0));
    }

    public function safeDown()
    {
       $this->DropColumn('tb_antrian', 'stat_ambil');
        
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170728_073042_alter_Tb_antrian_add_status cannot be reverted.\n";

        return false;
    }
    */
}
