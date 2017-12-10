<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AudiovisualSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audiovisual-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_anexo_4_audiovisual') ?>

    <?= $form->field($model, 'equipo_audiovisual') ?>

    <?= $form->field($model, 'equipo_computo') ?>

    <?= $form->field($model, 'departamento') ?>

    <?= $form->field($model, 'id_portada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
