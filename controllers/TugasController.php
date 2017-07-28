<?php

namespace app\controllers;
use app\models\Lokasi;
use yii\helpers\ArrayHelper;
use app\models\Tugas;
use yii\web\Controller;
use yii\filters\VerbFilter;

use Yii;

class TugasController extends Controller
{
     public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        
      $session = Yii::$app->session;
                 
      $model = Tugas::find()->where(['id_user'=>Yii::$app->user->id,'finish'=>null])->one();
      if($model==NULL)
      { 
      
        $model= new Tugas();
                 
      
      } else {
            return $this->redirect(['update', 'id' => $model->id_tugas]);   
      } 
      $lokasi= ArrayHelper::map(
                     Lokasi::find()
                                        ->select([
                                                'id_lokasi','nama_lokasi'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_lokasi','nama_lokasi');
     
      if (Yii::$app->request->post())
      {
          
          $model->load(Yii::$app->request->post());
          $model->id_user= Yii::$app->user->id;  
          $model->save();  
          if ($session->isActive)
          {
              $session['id_lokasi']=$model->id_lokasi;
                    $session['id_tugas']=$model->id_tugas;
              $session['nama_lokasi']=$model->lokasi->nama_lokasi;
              
          }     
                  return $this->redirect(['update', 'id' => $model->id_tugas]);   
 
      }
     
        
       
        return $this->render('index',
                            ['lokasi'=>$lokasi,
                              'model'=>$model,
                               ]);
    }

    public function actionUpdate($id)
    {
   $session = Yii::$app->session;
      $model = Tugas::findOne($id);
          $lokasi= ArrayHelper::map(
                     Lokasi::find()
                                        ->select([
                                                'id_lokasi','nama_lokasi'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_lokasi','nama_lokasi');
      
      if  ( $model->load(Yii::$app->request->post()))
      {
          
        
          $model->id_user= Yii::$app->user->id;  
           $model->save();  
          if ($session->isActive)
          {
             unset( $session['id_lokasi']);
               unset( $session['nama_lokasi']);
                  unset( $session['id_tugas']);
          }   

          return $this->redirect(['index']);   
 
      }
     
        
       
        return $this->render('view',
                            ['lokasi'=>$lokasi,
                              'model'=>$model,
                            ]);
    }    
           


}
