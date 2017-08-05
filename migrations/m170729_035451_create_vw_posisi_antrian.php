<?php

use yii\db\Migration;

class m170729_035451_create_vw_posisi_antrian extends Migration
{
    public function safeUp()
    {
        $this->execute("CREATE view vw_posisi_antrian as
        SELECT nama_lokasi,max(no_antrian) as no_antrian FROM tb_m_lokasi l
        left join tb_tugas t on t.id_lokasi=l.id_lokasi and t.finish is null and t.tgl_tugas = curdate()
        left join tb_d_tugas d on d.id_tugas=t.id_tugas 
        left join tb_antrian a on a.id_antrian = d.id_antrian
        group by nama_lokasi");
    }

    public function safeDown()
    {
        $this->execute("DROP view vw_posisi_antrian ");
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170729_035451_create_vw_posisi_antrian cannot be reverted.\n";

        return false;
    }
    */
}
