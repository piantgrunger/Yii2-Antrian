<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\vwposisiantrian */

$this->title = Yii::t('app', 'Vwposisiantrian  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Vwposisiantrian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vwposisiantrian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
