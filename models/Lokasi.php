<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_lokasi".
 *
 * @property int $id_lokasi
 * @property string $nama_lokasi
 * @property string $created_at
 * @property string $updated_at
 */
class Lokasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function tableName()
    {
        return 'tb_m_lokasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_lokasi'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama_lokasi'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lokasi' => Yii::t('app', 'Id Lokasi'),
            'nama_lokasi' => Yii::t('app', 'Nama Lokasi'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
