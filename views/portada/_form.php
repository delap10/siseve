<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\TipoEvento;
use app\models\PeriodosEscolares;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PortadaEvento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portada-evento-form">

    <?php $form = ActiveForm::begin();?>

    <div class="form-group">
        <?= $form->field($model, 'nombre_evento')->textInput(['maxlength' => true, 'placeholder' => 'Título del evento']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'coordinador_evento')->textInput(['maxlength' => true, 'placeholder' => 'Coordinador del evento']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'coordinador_operativo')->textInput(['maxlength' => true, 'placeholder' => 'Coordinador operativo del evento']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'encargado_informacion')->textInput(['maxlength' => true, 'placeholder' => 'Encargado de proporcionar información']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'correo_solicitante')->textInput(['maxlength' => true, 'type' => 'email', 'placeholder' => 'Ingrese su correo electrónico para contacto']) ?>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'lugar_evento')->textInput(['maxlength' => true, 'placeholder' => 'Lugar para el evento']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'fecha_inicio_evento')->widget(DatePicker::classname(), [
                    'language' => 'es',
                    'options' => ['placeholder' => 'Seleccione fecha'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'todayHighlight' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'hora_inicio_evento')->widget(TimePicker::classname(), [
                    'pluginOptions' => [
                        'showSeconds' => true,
                        'showMeridian' => false,
                        'minuteStep' => 1,
                        'secondStep' => 1,
                    ],
                    'addonOptions' => [
                        'asButton' => true,
                        'buttonOptions' => ['class' => 'btn btn-success']
                    ]
                ]) ?>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'fecha_termino_evento')->widget(DatePicker::classname(), [
                    'language' => 'es',
                    'options' => ['placeholder' => 'Seleccione fecha'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'todayHighlight' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'hora_termino_evento')->widget(TimePicker::classname(), [
                    'pluginOptions' => [
                        'showSeconds' => true,
                        'showMeridian' => false,
                        'minuteStep' => 1,
                        'secondStep' => 1,
                    ],
                    'addonOptions' => [
                        'asButton' => true,
                        'buttonOptions' => ['class' => 'btn btn-danger']
                    ]
                ]) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'objetivo_evento')->textarea(['rows' => 6, 'placeholder' => 'Objetivo del evento']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'lema')->textarea(['rows' => 6, 'placeholder' => 'Lema para el evento']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'tipo_evento')->dropDownList(ArrayHelper::map(TipoEvento::find()->all(), 'id_tipo_evento', 'tipo_evento'),['prompt' => 'Seleccione el tipo del evento']) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'periodo')->dropDownList(ArrayHelper::map(PeriodosEscolares::find()->all(), 'periodo', 'identificacion_larga'),['prompt' => 'Seleccione el periodo']) ?>
    </div>

    <label><b><i>NOTA:</i></b></label>

    <?= Html::ul([
            'Deberá registrar su evento por lo menos 15 días hábiles antes de la fecha a realizarse, anexar Tarjeta Informativa del evento y relación de invitados, entregar el programa y el organigrama (en su caso) y la solicitud vía memorandum para los apoyos  correspondientes.',
            'Para poder brindarle un servicio de calidad y a la altura del evento que usted está organizando, le solicitamos llene los anexos correspondientes y turnarlos a las unidades orgánicas responsables de brindarle los apoyos requeridos.'

        ]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
