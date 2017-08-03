<?php
/* @var $this yii\web\View */
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use yii\helpers\Html;

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/Terbilang.js');

     
?>
<div class="tugas-index">
    <audio></audio>

    <p class="FlashPreviewBox">
<h2> Selamat Datang <?=Yii::$app->user->identity->username?></h2>

   <?="<h4> Lokasi Tugas :".$model->lokasi->nama_lokasi."</h4>";
        ?>
  <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
  
  
        <?php 
          echo  Html::submitButton(Yii::t('app', 'Berhenti Bertugas'), ['class' => 'btn btn-danger']) ;
          
        ?>
        <?= $form->field($model, 'id_lokasi')->hiddenInput()->label(""); ?>

    <?php ActiveForm::end(); ?>
</p>
<div class="jumbotron">
        
   <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model_det) ?> <!-- ADDED HERE -->
        <?= $form->field($model_det, 'id_antrian')->hiddenInput()->label(""); ?>
    <h1>Antrian Nomor :</h1>
    <h1 style="font-size: 500%;" id="no_antrian"><?=$model_det->no_antrian;?></h1>

    
        <?php 
          echo  Html::submitButton(Yii::t('app', 'Panggil Baru'), ['class' => 'btn btn-success']) ;
          
        ?>
         <?= Html::button('Panggil Ulang', [ 'class' => 'btn btn-primary', 'onclick' => ' (function ( $event ) { terbilang(document.getElementById(\'no_antrian\').innerText); })();' ]);?>

        
        
        
        
    <?php ActiveForm::end(); ?>

 
  </div>

</div>