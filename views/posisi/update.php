<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\vwposisiantrian */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Vwposisiantrian',
]) . $model->nama_lokasi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Vwposisiantrian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_lokasi, 'url' => ['view', 'id' => $model->nama_lokasi]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vwposisiantrian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
