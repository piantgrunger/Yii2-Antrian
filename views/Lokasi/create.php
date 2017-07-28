<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lokasi */

$this->title = Yii::t('app', 'Lokasi  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Lokasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lokasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
