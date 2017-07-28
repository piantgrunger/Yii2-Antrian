<?php

namespace app\controllers;

use Yii;
use app\models\Antrian;
use app\models\AntrianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AntrianController implements the CRUD actions for Antrian model.
 */
class AntrianController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all Antrian models.
     * @return mixed
     */
    public function actionIndex()
    {
       $model = new Antrian();
        $searchModel = new AntrianSearch();
        $dataProvider = $searchModel->searchLastNoAntrian(date('Y-m-d'));
        $jumlah = $searchModel->searchTotalAntrian(date('Y-m-d'));
        
        if ($dataProvider == null )
        {
            $no_antrian = 1;
        } else         
        {    
       
            $no_antrian = $dataProvider->no_antrian+1;    
        }    
         if (Yii::$app->request->post() ) {
            $model->no_antrian =$no_antrian;
            $model->tgl_antrian =date('Y-m-d');
            $model->save();
            Yii::$app->controller->refresh();
  
         }

        return $this->render('index', [
        
            'no_antrian' =>$no_antrian,
            'jumlah' => $jumlah,
        ]);
    }

    /**
     * Displays a single Antrian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Antrian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Antrian();
        $searchModel = new AntrianSearch();
        $dataProvider = $searchModel->searchLastNoAntrian(date('Y-m-d'));
      
        if ($dataProvider == null )
        {
            $no_antrian = 1;
        } else         
        {    
          $no_antrian = $dataProvider->no_antrian+1;    
        }       
        $model->no_antrian =$no_antrian;
        $model->tgl_antrian =date('Y-m-d');
        $model->save();
        
        return $this->actionIndex();
/*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_antrian]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
   
  */
    }     
    /**
     * Updates an existing Antrian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_antrian]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Antrian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        
       try
      {
        $this->findModel($id)->delete();
      
      }
      catch(\yii\db\IntegrityException  $e)
      {
	Yii::$app->session->setFlash('error', "Data Tidak Dapat Dihapus Karena Dipakai Modul Lain");
       } 
         return $this->redirect(['index']);
    }

    /**
     * Finds the Antrian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Antrian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Antrian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
