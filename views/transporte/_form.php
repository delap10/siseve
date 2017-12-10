<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\TipoTransporte;

/* @var $this yii\web\View */
/* @var $model app\models\Transporte */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transporte-form">

    <?php
        $personas_transportar = array(
            'Personal' => 'Personal',
            'Escolta y Banda de Guerra' => 'Escolta y Banda de Guerra',
            'Edecanes' => 'Edecanes',
            'Personal de Apoyo' => 'Personal de Apoyo',
            'Material de apoyo para evento' => 'Material de apoyo para evento',
            'Alumnos' => 'Alumnos'
        );

        $form = ActiveForm::begin();
    ?>

    <div class="form-group">
        <div class="row">
            <h5><b>VIII. CON GASOLINA Y CHOFER</b></h5>
            <div class="col-md-6">
                <?= $form->field($model, 'transportar')->checkboxList($personas_transportar, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'cantidad')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'tipo_transporte')->dropDownList(ArrayHelper::map(TipoTransporte::find()->all(), 'id_tipo_transporte', 'tipo_transporte'),['prompt' => 'Seleccione el transporte a utlizar']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'vales_gasolina')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'importe')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'anexo_3')->hiddenInput(['value' => $id_anexo]) ?>

    <?= Html::hiddenInput('id_portada', $id_portada); ?>

    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Añadir anexo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

        <?= Html::a('Omitir este anexo', ['audiovisual/create', 'id_portada' => $id_portada], ['class' => 'btn btn-warning', 'style' => 'margin-left:50px;']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
