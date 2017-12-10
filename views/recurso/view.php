<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Anexo3Recurso */

$this->title = $model->id_anexo_3_recurso;
$this->params['breadcrumbs'][] = ['label' => 'Anexo3 Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anexo3-recurso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_anexo_3_recurso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_anexo_3_recurso], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_anexo_3_recurso',
            'colocar_letrero',
            'lona_presidium',
            'organizacion_mesa:ntext',
            'repartir_invitacion',
            'cantidad_personas',
            'cantidad_mesas',
            'cantidad_sillas',
            'color_paño',
            'cantidad_mesas_adicionales',
            'cantidad_sillas_adicionales',
            'sonido_interno',
            'instalacion',
            'cantidad_sillas_auditorio',
            'cantidad_mesas_refresco',
            'barrer',
            'aspirar',
            'asear_banos',
            'limpiar_vidrios',
            'quitar_chicle',
            'tintoreria',
            'recoger_basura',
            'departamento',
            'id_portada',
        ],
    ]) ?>

</div>
