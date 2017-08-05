<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Antrian */

$this->title = Yii::t('app', 'Antrian  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Antrian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antrian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
