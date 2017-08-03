<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Lokasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lokasi-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'nama_lokasi')->textInput(['maxlength' => true]) ?>
        
    <?= $form->field($model, 'id_jns_lokasi')->widget(Select2::classname(), [
    'data' => $jns_lokasi,
    'options' => ['placeholder' => 'Pilih Jns Lokasi ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Jns Lokasi');   ?>
   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
