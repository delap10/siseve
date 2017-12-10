<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DifusionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="difusion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_anexo_1_difusion') ?>

    <?= $form->field($model, 'catidad_fotografias') ?>

    <?= $form->field($model, 'cobertura') ?>

    <?= $form->field($model, 'television') ?>

    <?= $form->field($model, 'prensa') ?>

    <?php // echo $form->field($model, 'tipo_impresion') ?>

    <?php // echo $form->field($model, 'cantidad_duplicados') ?>

    <?php // echo $form->field($model, 'cantidad_copias') ?>

    <?php // echo $form->field($model, 'invitacion_interna') ?>

    <?php // echo $form->field($model, 'invitacion_externa') ?>

    <?php // echo $form->field($model, 'departamento') ?>

    <?php // echo $form->field($model, 'id_portada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
