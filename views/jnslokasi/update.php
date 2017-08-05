<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jnslokasi */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jns lokasi',
]) . $model->nama_jns_lokasi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Jns lokasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jns_lokasi, 'url' => ['view', 'id' => $model->id_jns_lokasi]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jnslokasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
