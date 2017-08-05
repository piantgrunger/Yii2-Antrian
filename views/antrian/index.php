<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
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


     <?php $form = ActiveForm::begin(); 
         ?>
        <?= $form->errorSummary($modelsearch) ?> <!-- ADDED HERE -->

        
    <?= $form->field($modelsearch, 'id_jns_lokasi')->widget(Select2::classname(), [
    'data' => $jns_lokasi,
    'options' => ['placeholder' => 'Pilih Jns Lokasi ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Jns Lokasi');   ?>
   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Change'), ['class' => 'btn btn-success']) ?>
    </div>
          <?php  ActiveForm::end(); ?>   
   
      <div class='jumbotron' >
          <div id='cetak'>
          <h1>Antrian Nomor :</h1>
          <h1 style="font-size: 1000%;"><?=$no_antrian;?></h1>
          <h3>Menunggu <?=$jumlah?> Orang</h3>
          
          </div>
          <h1><?= Html::button(Yii::t('app', 'Cetak'),  [
           
            'class' => 'btn btn-primary btn-task-form',
              "id" =>'btn-cetak',       
            'data' => [
         
                'method' => 'post',
            ],
        ]) ?> </h1></div>

</div>
