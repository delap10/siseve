<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Organigrama;

/* @var $this yii\web\View */
/* @var $model app\models\Anexo3Recurso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anexo3-recurso-form">

    <?php 
        $confimacion = array(
            1 => 'SI', 
            0 => 'NO'
        );
        
        $colores_paño = array(
            'Azul' => 'Azul', 
            'Verde' => 'Verde'
        );

        $instalacion = array(
            'Podium' => 'Podium',
            'Mamparas' => 'Mamparas',
            'Contacto' => 'Contacto',
            'Extensiones' => 'Extensiones',
            'Focos' => 'Focos',
            'Lamparas' => 'Lámparas'
        );

        $sonido_interno =array(
            'Bocinas' => 'Bocinas',
            'Microfono' => 'Micrófono'
        );

        $barrer_lugares = array(
            'Pasillo' => 'Pasillo',
            'Andadores' => 'Andadores',
            'Explanadas' => 'Explanadas',
            'Estacionamiento '=> 'Estacionamiento',
            'Audiovisual' => 'Audiovisual',
            'Centro de informacion' => 'Centro de información',
            'Plaza del pozo' => 'Plaza del pozo',
            'Laboratorio de Computo' => 'Laboratorio de Cómputo',
            'Programoteca' => 'Programoteca',
            'Sala didactica' => 'Sala didáctica'
        );

        $aspirar_lugares = array(
            'Audiovisual' => 'Audiovisual',
            'Sala juntas direccion' => 'Sala juntas dirección',
            'Direccion' => 'Dirección',
            'Sala didactica' => 'Sala didactica'
        );

        $asear_baños = array(
            'Direccion' => 'Dirección',
            'Centro de informacion' => 'Centro de información',
            'Laboratorio de computo' => 'Laboratorio de cómputo',
            'Edificio "C"' => 'Edificion "C"'
        );

        $tintoreria = array(
            'Paños' => 'Paños',
            'Cortinas' => 'Cortinas'
        );

        $form = ActiveForm::begin(); 
    ?>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'colocar_letrero')->dropDownList($confimacion,['prompt' => 'Seleccione']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'lona_presidium')->dropDownList($confimacion,['prompt' => 'Seleccione']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'repartir_invitacion')->dropDownList($confimacion,['prompt' => 'Seleccione']) ?>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'organizacion_mesa')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <div class="row">
            <h5><b>VI. PRESIDIUM</b></h5>
            <div class="col-md-3">
                <?= $form->field($model, 'cantidad_personas')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'cantidad_mesas')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'cantidad_sillas')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'color_paño')->dropDownList($colores_paño,['prompt' => 'Seleccione color']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <h5><b>Sillas y mesas adicionales</b></h5>
            <div class="col-md-6">
                <?= $form->field($model, 'cantidad_mesas_adicionales')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'cantidad_sillas_adicionales')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <h5><b>Se requiere:</b></h5>
            <div class="col-md-6">
                <?= $form->field($model, 'instalacion')->checkboxList($instalacion, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'sonido_interno')->checkboxList($sonido_interno, ['class' => 'checkbox']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <h5><b>VII. ACONDICIONAMIENTO DEL LUGAR</b></h5>
            <div class="col-md-6">
                <?= $form->field($model, 'cantidad_sillas_auditorio')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'cantidad_mesas_refresco')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'barrer')->checkboxList($barrer_lugares, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'aspirar')->checkboxList($aspirar_lugares, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'asear_banos')->checkboxList($asear_baños, ['class' => 'checkbox']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'limpiar_vidrios')->dropDownList($confimacion,['prompt' => 'Seleccione']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'quitar_chicle')->dropDownList($confimacion,['prompt' => 'Seleccione']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'tintoreria')->checkboxList($tintoreria, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'recoger_basura')->dropDownList($confimacion,['prompt' => 'Seleccione']) ?>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'departamento')->dropDownList(ArrayHelper::map(Organigrama::find()->all(), 'clave_area', 'p_sustantivos'),['prompt' => 'Seleccione el departamento encargado']) ?>

    <?= $form->field($model, 'id_portada')->hiddenInput(['value' => $id_portada]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Añadir anexo' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

        <?= Html::a('Omitir este anexo', ['audiovisual/create', 'id_portada' => $id_portada], ['class' => 'btn btn-warning', 'style' => 'margin-left:50px;']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>