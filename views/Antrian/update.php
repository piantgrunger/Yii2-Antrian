<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Antrian */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Antrian',
]) . $model->id_antrian;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Antrian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_antrian, 'url' => ['view', 'id' => $model->id_antrian]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="antrian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
