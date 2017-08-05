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
        
 
    <?= $form->field($model, 'id_lokasi')->widget(Select2::classname(), [
    'data' => $lokasi,
    'options' => ['placeholder' => 'Pilih Lokasi ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Lokasi Tugas');   ?>
   

    <div class="form-group">
       
          <?=  Html::submitButton(Yii::t('app', 'Bertugas'), ['class' => 'btn btn-success']) ;
               ?>
    </div>

    <?php ActiveForm::end(); ?>

</p>
</div>