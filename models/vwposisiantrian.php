<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "vw_posisi_antrian".
 *
 * @property string $nama_lokasi
 * @property string $max(no_antrian)
 */
class vwposisiantrian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


 
    public static function tableName()
    {
        return 'vw_posisi_antrian';
    }

    /**
     * @inheritdoc
     */
    
    public static function primaryKey() {
        return ['nama_lokasi'];
    }
    
    public function rules()
    {
        return [
            [['nama_lokasi'], 'required'],
            [['no_antrian'], 'integer'],
            [['nama_lokasi'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nama_lokasi' => Yii::t('app', 'Nama Lokasi'),
            'max(no_antrian)' => Yii::t('app', 'Max(no Antrian)'),
        ];
    }
}
