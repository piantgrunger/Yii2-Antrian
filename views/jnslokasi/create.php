<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Jnslokasi */

$this->title = Yii::t('app', 'Jns lokasi  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Jns lokasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jnslokasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
