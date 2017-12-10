<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\Models\DifusionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Difusions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="difusion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Difusion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_anexo_1_difusion',
            'cantidad_fotografias',
            'cobertura',
            'television',
            'prensa',
            // 'tipo_impresion',
            // 'cantidad_duplicados',
            // 'cantidad_copias',
            // 'invitacion_interna',
            // 'invitacion_externa',
            // 'departamento',
            // 'id_portada',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
