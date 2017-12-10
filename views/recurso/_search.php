<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Anexo3RecursoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anexo3-recurso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_anexo_3_recurso') ?>

    <?= $form->field($model, 'colocar_letrero') ?>

    <?= $form->field($model, 'lona_presidium') ?>

    <?= $form->field($model, 'organizacion_mesa') ?>

    <?= $form->field($model, 'repartir_invitacion') ?>

    <?php // echo $form->field($model, 'cantidad_personas') ?>

    <?php // echo $form->field($model, 'cantidad_mesas') ?>

    <?php // echo $form->field($model, 'cantidad_sillas') ?>

    <?php // echo $form->field($model, 'color_paño') ?>

    <?php // echo $form->field($model, 'cantidad_mesas_adicionales') ?>

    <?php // echo $form->field($model, 'cantidad_sillas_adicionales') ?>

    <?php // echo $form->field($model, 'sonido_interno') ?>

    <?php // echo $form->field($model, 'instalacion') ?>

    <?php // echo $form->field($model, 'cantidad_sillas_auditorio') ?>

    <?php // echo $form->field($model, 'cantidad_mesas_refresco') ?>

    <?php // echo $form->field($model, 'barrer') ?>

    <?php // echo $form->field($model, 'aspirar') ?>

    <?php // echo $form->field($model, 'asear_banos') ?>

    <?php // echo $form->field($model, 'limpiar_vidrios') ?>

    <?php // echo $form->field($model, 'quitar_chicle') ?>

    <?php // echo $form->field($model, 'tintoreria') ?>

    <?php // echo $form->field($model, 'recoger_basura') ?>

    <?php // echo $form->field($model, 'departamento') ?>

    <?php // echo $form->field($model, 'id_portada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
