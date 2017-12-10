<?php

use yii\db\Query;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortadaEventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formato para registro de eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portada-evento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar nuevo Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre_evento',
            'coordinador_evento',
            'encargado_informacion',
            //'fecha_inicio_evento',
            [
                'attribute' => 'fecha_inicio_evento',
                'value' => 'fecha_inicio_evento',
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'attribute' => 'fecha_inicio_evento',
                    'model' => $searchModel,
                    'language' => 'es',
                    'type' => DatePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'todayHighlight' => true,
                        'format' => 'yyyy-m-dd'
                    ]
                ]),
            ],
            'lugar_evento',
            [
                'attribute' => 'estatus',
                'filter' => array("1" => "Aceptado", "2" => "Pendiente", "3" => "Suspendido", "4" => "Cancelado")
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <!--div class="row">
        <?php /*foreach ($eventos as $evento) {*/?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2><? //= $evento['nombre_evento'] ?></h2>
                </div>
                <div class="card-image">
                    <?//= Html::img('@web/img/logos/ITT.jpg', ['class' => 'text-center']) ?>
                </div>
                
                <div class="card-container">
                    <p><?//= $evento['objetivo_evento'] ?></p>
                </div>
                
                <div class="card-action">
                    <a href="#" target="new_blank"></a>
                    <a href="#" target="new_blank"></a>
                    <a href="#" target="new_blank">Link</a>
                    <a href="#" target="new_blank">Link</a>
                    <a href="#" target="new_blank">Link</a>
                </div>
            </div>
        </div>
        <?php /*} */?>
    </div-->

    <?php Pjax::end(); ?>

</div>
