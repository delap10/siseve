<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransporteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transporte-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_transporte') ?>

    <?= $form->field($model, 'transportar') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'vales_gasolina') ?>

    <?= $form->field($model, 'importe') ?>

    <?php // echo $form->field($model, 'tipo_transporte') ?>

    <?php // echo $form->field($model, 'anexo_3') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
