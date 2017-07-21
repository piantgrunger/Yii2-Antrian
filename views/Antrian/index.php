<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use yii\helpers\Url;
/*
$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'no_antrian',
            'tgl_antrian',

         ['class' => 'yii\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],$this->context->route),    ],    ]; echo ExportMenu::widget(['dataProvider' => $dataProvider,'columns' => $gridColumns]);
*/
/* @var $this yii\web\View */
/* @var $searchModel app\models\AntrianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Antrian');
$this->params['breadcrumbs'][] = $this->title;
$css="@media print {
  body * {
    visibility: hidden;
  }
  #cetak, #cetak * {
    visibility: visible;
  }
  #cetak {
    position: absolute;
    left: 0;
    top: 0;
  }
}";
$this->registerCss($css);
$js="	
    
jQuery(document).ready(function($){
   // Set Button ID or class replacing # to .  
    $(\"#btn-cetak\").on('click', function(event){
         // When you click on this button don't do any thing.
            window.print();
         // Set form ID and submit that form
          window.location.replace('".Url::toRoute('index')."') 
    });
})";
$this->registerJs($js);
?>
<div class="antrian-index">


     <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
      <div class='jumbotron' >
          <div id='cetak'>
          <h1>Antrian Nomor :</h1>
          <h1 style="font-size: 1000%;"><?=$no_antrian;?></h1>
          </div>
          <h1><?= Html::button(Yii::t('app', 'Cetak'),  [
           
            'class' => 'btn btn-primary btn-task-form',
              "id" =>'btn-cetak',       
            'data' => [
         
                'method' => 'post',
            ],
        ]) ?> </h1></div>

</div>
