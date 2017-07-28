<?php
/* @var $this yii\web\View */
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use yii\helpers\Html;

?>
<div class="tugas-index">

<p>
<h2> Selamat Datang <?=Yii::$app->user->identity->username?></h2>



    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
        <?= $form->field($model, 'id_lokasi')->hiddenInput()->label(""); ?>
  
     <?="<h3> Lokasi Tugas :".$model->lokasi->nama_lokasi."</h3>";
        ?>

    <div class="form-group">
        <?php 
          echo  Html::submitButton(Yii::t('app', 'Berhenti Bertugas'), ['class' => 'btn btn-danger']) ;
          
        ?>
    </div>
  <?php ActiveForm::end(); ?>
  
           <div class="jumbotron">
        
   <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model_det) ?> <!-- ADDED HERE -->
        <?= $form->field($model_det, 'id_antrian')->hiddenInput()->label(""); ?>
    <h1>Antrian Nomor :</h1>
          <h1 style="font-size: 1000%;"><?=$model_det->no_antrian;?></h1>

    
        <?php 
          echo  Html::submitButton(Yii::t('app', 'Panggil Baru'), ['class' => 'btn btn-success']) ;
          
        ?>
    </div>

    <?php ActiveForm::end(); ?>
</p>
</div>