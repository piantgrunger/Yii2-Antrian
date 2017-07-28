<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_tugas".
 *
 * @property int $id_tugas
 * @property int $id_user
 * @property int $id_lokasi
 * @property string $start
 * @property string $finish
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMLokasi $lokasi
 * @property User $user
 */
class Tugas extends \yii\db\ActiveRecord
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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at','start'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at','finish'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function tableName()
    {
        return 'tb_tugas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_lokasi'], 'required'],
            [['id_user', 'id_lokasi'], 'integer'],
            [['start', 'finish', 'created_at', 'updated_at'], 'safe'],
            [['id_lokasi'], 'exist', 'skipOnError' => true, 'targetClass' => Lokasi::className(), 'targetAttribute' => ['id_lokasi' => 'id_lokasi']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tugas' => Yii::t('app', 'Id Tugas'),
            'id_user' => Yii::t('app', 'Id User'),
            'id_lokasi' => Yii::t('app', 'Id Lokasi'),
            'start' => Yii::t('app', 'Start'),
            'finish' => Yii::t('app', 'Finish'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokasi()
    {
        return $this->hasOne(Lokasi::className(), ['id_lokasi' => 'id_lokasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
