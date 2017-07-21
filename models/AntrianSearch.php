<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Antrian;

/**
 * AntrianSearch represents the model behind the search form of `app\models\Antrian`.
 */
class AntrianSearch extends Antrian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_antrian', 'no_antrian'], 'integer'],
            [['tgl_antrian'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Antrian::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_antrian' => $this->id_antrian,
            'no_antrian' => $this->no_antrian,
            'tgl_antrian' => $this->tgl_antrian,
        ]);

        return $dataProvider;
    }
    
 public function searchLastNoAntrian($date)
    {
        $query = Antrian::find()->where([
               'tgl_antrian' => $date
        ])->orderBy(['No_antrian'=>SORT_DESC])->one();

         
       

            return $query;
    }
    
        
}
