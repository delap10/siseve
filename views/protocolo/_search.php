<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProtocoloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="protocolo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_anexo_2_protocolo') ?>

    <?= $form->field($model, 'leyenda_lona') ?>

    <?= $form->field($model, 'recepcion') ?>

    <?= $form->field($model, 'honores_bandera') ?>

    <?= $form->field($model, 'centro_informacion') ?>

    <?php // echo $form->field($model, 'atencion_presidium') ?>

    <?php // echo $form->field($model, 'departamento') ?>

    <?php // echo $form->field($model, 'id_portada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
