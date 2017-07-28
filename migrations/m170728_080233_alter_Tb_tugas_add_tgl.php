<?php

use yii\db\Migration;

class m170728_080233_alter_Tb_tugas_add_tgl extends Migration
{
    public function safeUp()
    {
      $this->addColumn('tb_tugas', 'tgl_tugas', $this->dateTime()->notNull());

    }

    public function safeDown()
    {
        $this->dropColumn('tb_tugas', 'tgl_tugas');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170728_080233_alter_Tb_tugas_add_tgl cannot be reverted.\n";

        return false;
    }
    */
}
