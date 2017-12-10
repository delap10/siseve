<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Organigrama;

/* @var $this yii\web\View */
/* @var $model app\models\Protocolo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="protocolo-form">

    <?php
        $form = ActiveForm::begin();
        $recepcion = array(
            'Secretarias' => 'Secretarias',
            'Edecanes' => 'Edecanes',
            'Confimacion de presidium' => 'Confirmación de presidium',
            'Recepcion de invitados' => 'Recepción de invitados',
            'Registro de participantes/asistentes' => 'Registro de participantes/asistentes'
        );

        $honores_bandera = array(
            'Escolata y banda de guerra' => 'Escolta y banda de guerra',
            'Director de himnos' => 'Director de himnos'
        );

        $centro_informacion = array(
            'Maestro de ceremonia' => 'Maestro de ceremonia',
            'Elaboracion de programa' => 'Elaboración de programa',
            'Redaccion de discursos de Director' => 'Redacción de discursos de Director',
            'Diplomas/Reconocimientos/Constancias' => 'Diplomas/Reconocimientos/Constancias',
            'Trofeos' => 'Trofeos',
            'Premios' => 'Premios'
        );

        $atencion_presidium = array(
            'Agua' => 'Agua',
            'Vasos de cristal' => 'Vasos de cristal',
            'Dulces' => 'Dulces',
            'Servilletas' => 'Servilletas',
            'Cafe' => 'Café',
            'Refrescos' => 'Refrescos'
        );
    ?>

    <div class="form-group">
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'leyenda_lona')->textarea(['rows' => 6]) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <h5><b>V. NECESIDADES</b></h5>
            <div class="col-md-6">
                <?= $form->field($model, 'recepcion')->checkboxList($recepcion, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'honores_bandera')->checkboxList($honores_bandera, ['class' => 'checkbox']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'centro_informacion')->checkboxList($centro_informacion, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'atencion_presidium')->checkboxList($atencion_presidium, ['class' => 'checkbox']) ?>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'departamento')->dropDownList(ArrayHelper::map(Organigrama::find()->all(), 'clave_area', 'p_sustantivos'),['prompt' => 'Seleccione el departamento encargado']) ?>

    <?= $form->field($model, 'id_portada')->hiddenInput(['value' => $id_portada]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Añadir anexo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

        <?= Html::a('Omitir este anexo', ['recurso/create', 'id_portada' => $id_portada], ['class' => 'btn btn-warning', 'style' => 'margin-left:50px;']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
