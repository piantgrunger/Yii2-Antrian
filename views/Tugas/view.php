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

</p>
</div>