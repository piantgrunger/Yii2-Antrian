<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_jns_lokasi".
 *
 * @property int $id_jns_lokasi
 * @property string $nama_jns_lokasi
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMLokasi[] $tbMLokasis
 */
class Jnslokasi extends \yii\db\ActiveRecord
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
        return 'tb_m_jns_lokasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_jns_lokasi'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama_jns_lokasi'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jns_lokasi' => Yii::t('app', 'Id Jns Lokasi'),
            'nama_jns_lokasi' => Yii::t('app', 'Nama Jns Lokasi'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbMLokasis()
    {
        return $this->hasMany(TbMLokasi::className(), ['id_jns_lokasi' => 'id_jns_lokasi']);
    }
}
