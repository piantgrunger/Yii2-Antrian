<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'nama_lokasi',
            'no_antrian',

             ];
echo ExportMenu::widget(['dataProvider' => $dataProvider,'columns' => $gridColumns]);

/* @var $this yii\web\View */
/* @var $searchModel app\models\vwposisiantrianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posisi Antrian ');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vwposisiantrian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p> <?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>        <?=  Html::a(Yii::t('app', 'Vwposisiantrian  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    <?php } ?>    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        'responsive'=>true,
        'hover'=>true,
         'resizableColumns'=>true,    
    ]); ?>
    <?php Pjax::end(); ?>
</div>
