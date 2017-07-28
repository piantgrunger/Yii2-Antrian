<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_d_tugas".
 *
 * @property int $id_d_tugas
 * @property int $id_tugas
 * @property int $id_antrian
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbAntrian $antrian
 * @property TbTugas $tugas
 */
class d_tugas extends \yii\db\ActiveRecord
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
        return 'tb_d_tugas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tugas', 'id_antrian'], 'required'],
            [['id_tugas', 'id_antrian'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_antrian'], 'exist', 'skipOnError' => true, 'targetClass' => Antrian::className(), 'targetAttribute' => ['id_antrian' => 'id_antrian']],
            [['id_tugas'], 'exist', 'skipOnError' => true, 'targetClass' => Tugas::className(), 'targetAttribute' => ['id_tugas' => 'id_tugas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_d_tugas' => Yii::t('app', 'Id D Tugas'),
            'id_tugas' => Yii::t('app', 'Id Tugas'),
            'id_antrian' => Yii::t('app', 'Id Antrian'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntrian()
    {
        return $this->hasOne(Antrian::className(), ['id_antrian' => 'id_antrian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTugas()
    {
        return $this->hasOne(Tugas::className(), ['id_tugas' => 'id_tugas']);
    }
    
       public function getNo_Antrian()
    {
        if ($this->antrian !== null)
        {     
          return $this->antrian->no_antrian;
        }
        else
        {
             return 0;
        }
    }
}
