<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\PortadaEventoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portada-evento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_portada_evento') ?>

    <?= $form->field($model, 'nombre_evento') ?>

    <?= $form->field($model, 'fecha_registro') ?>

    <?= $form->field($model, 'coordinador_evento') ?>

    <?= $form->field($model, 'coordinador_operativo') ?>

    <?php // echo $form->field($model, 'encargado_informacion') ?>

    <?php // echo $form->field($model, 'lugar_evento') ?>

    <?php // echo $form->field($model, 'fecha_inicio_evento') ?>

    <?php // echo $form->field($model, 'fecha_termino_evento') ?>

    <?php // echo $form->field($model, 'hora_inicio_evento') ?>

    <?php // echo $form->field($model, 'hora_termino_evento') ?>

    <?php // echo $form->field($model, 'objetivo_evento') ?>

    <?php // echo $form->field($model, 'lema') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <?php // echo $form->field($model, 'estatus') ?>

    <?php // echo $form->field($model, 'correo_solicitante') ?>

    <?php // echo $form->field($model, 'tipo_evento') ?>

    <?php // echo $form->field($model, 'periodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
