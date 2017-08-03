<?php

namespace app\controllers;

use Yii;
use app\models\Antrian;
use app\models\AntrianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\DynamicModel;
use yii\helpers\ArrayHelper;
use app\models\Jnslokasi;

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
        $session = Yii::$app->session;
        if (!isset($session['id_jns_lokasi'])) 
        {   
          $id_jns_lokasi=1;
        } else {
          $id_jns_lokasi =  $session['id_jns_lokasi'];  
        }
        $model = new Antrian();
         $modelsearch = new DynamicModel([
        'id_jns_lokasi'
         ]);
        $modelsearch->addRule(['id_jns_lokasi'], 'required');
      
        if  ($modelsearch->load(Yii::$app->request->post()))
        {
           $id_jns_lokasi = $modelsearch->id_jns_lokasi;
           echo var_dump($id_jns_lokasi);
           $session['id_jns_lokasi'] = $id_jns_lokasi;
           $id_jns_lokasi =  $session['id_jns_lokasi']; 
            
        }
        $modelsearch->id_jns_lokasi = $id_jns_lokasi;
        $searchModel = new AntrianSearch();
        $dataProvider = $searchModel->searchLastNoAntrian(date('Y-m-d'),$id_jns_lokasi);
        $jumlah = $searchModel->searchTotalAntrian(date('Y-m-d'),$id_jns_lokasi);
        
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
            $model->id_jns_lokasi =$id_jns_lokasi;
            
            $model->save();
            Yii::$app->controller->refresh();
  
         }
         
      
          $jns_lokasi= ArrayHelper::map(
           Jnslokasi::find()
                                        ->select([
                                                'id_jns_lokasi','nama_jns_lokasi'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_jns_lokasi','nama_jns_lokasi');
         $modelsearch->id_jns_lokasi=$id_jns_lokasi ;
        return $this->render('index', [
        
            'no_antrian' =>$no_antrian,
            'jumlah' => $jumlah,
            'modelsearch'=>$modelsearch,
            'jns_lokasi' => $jns_lokasi,
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
