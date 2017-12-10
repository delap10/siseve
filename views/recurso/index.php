<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Anexo3RecursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anexo3 Recursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anexo3-recurso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Anexo3 Recurso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_anexo_3_recurso',
            'colocar_letrero',
            'lona_presidium',
            'organizacion_mesa:ntext',
            'repartir_invitacion',
            // 'cantidad_personas',
            // 'cantidad_mesas',
            // 'cantidad_sillas',
            // 'color_paño',
            // 'cantidad_mesas_adicionales',
            // 'cantidad_sillas_adicionales',
            // 'sonido_interno',
            // 'instalacion',
            // 'cantidad_sillas_auditorio',
            // 'cantidad_mesas_refresco',
            // 'barrer',
            // 'aspirar',
            // 'asear_banos',
            // 'limpiar_vidrios',
            // 'quitar_chicle',
            // 'tintoreria',
            // 'recoger_basura',
            // 'departamento',
            // 'id_portada',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
