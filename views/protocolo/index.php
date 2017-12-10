<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProtocoloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Protocolos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protocolo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Protocolo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_anexo_2_protocolo',
            'leyenda_lona:ntext',
            'recepcion',
            'honores_bandera',
            'centro_informacion',
            // 'atencion_presidium',
            // 'departamento',
            // 'id_portada',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
