<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_antrian".
 *
 * @property int $id_antrian
 * @property string $no_antrian
 * @property string $tgl_antrian
 */
class Antrian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_antrian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_antrian'], 'required'],
            [['no_antrian'], 'integer'],
            [['tgl_antrian'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_antrian' => Yii::t('app', 'Id Antrian'),
            'no_antrian' => Yii::t('app', 'No Antrian'),
            'tgl_antrian' => Yii::t('app', 'Tgl Antrian'),
        ];
    }
    
    
}
