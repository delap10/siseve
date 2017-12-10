<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\PortadaEvento */

$this->title = $model->nombre_evento;
$this->params['breadcrumbs'][] = ['label' => 'Portada Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portada-evento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_portada_evento], ['class' => 'btn btn-primary']) ?>

        <!-- Button trigger modal Estatus -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#estatusModal">
            Cambiar estatus
        </button>
        
        <!-- Button trigger modal Terminar -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#terminarModal">
            Terminar
        </button>

        <!-- Button trigger modal Eliminar -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarModal">
            Eliminar
        </button>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_portada_evento',
            'nombre_evento',
            'fecha_registro',
            'coordinador_evento',
            'coordinador_operativo',
            'encargado_informacion',
            'lugar_evento',
            'fecha_inicio_evento',
            'fecha_termino_evento',
            'hora_inicio_evento',
            'hora_termino_evento',
            'objetivo_evento:ntext',
            'lema:ntext',
            'activo',
            'estatus',
            'correo_solicitante',
            'tipo_evento',
            'periodo',
        ],
    ]) ?>

    <!-- Modal para terminar el evento-->
    <div class="modal fade" id="terminarModal" tabindex="-1" role="dialog" aria-labelledby="Terminar">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="myModalLabel">¿Terminó el evento?</h2>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <?= Html::a('Terminar', ['terminar', 'v' => $model->id_portada_evento], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para eliminar el evento-->
    <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="Terminar">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="myModalLabel">¿Está seguro de borrar el evento?</h2>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id_portada_evento], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="estatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cambiar el estatus del evento</h4>
                </div>
                <div class="modal-body">
                    <?php $estatus = array('Aceptado' => 'Acepatado', 'Pendiente' => 'Pendiente', 'Suspendido' => 'Suspendido', 'Cancelado' => 'Cancelado'); ?>
                    <?= Html::beginForm(['portada/status', 'v' => $model->id_portada_evento], 'post');?>
                    <?= Html::dropDownList('estatus', 'estatus', $estatus, ['class' => 'form-control', 'prompt' => 'Cambiar estatus']) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <?= Html::submitButton('Cambiar', ['class' => 'btn btn-info']) ?>
                    <?= Html::endForm(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
