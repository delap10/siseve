<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Organigrama;

/* @var $this yii\web\View */
/* @var $model app\models\Difusion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="difusion-form">

    <?php 
        $form = ActiveForm::begin();
        $cobertura = array(
            'Entrevistas' => 'Entrevistas', 
            'Spots' => 'Spots', 
            'Anuncios' => 'Anuncios', 
            'Boletín de prensa' => 'Boletín de prensa'
        );

        $television = array(
            'Canal 4' => 'Canal 4', 
            'Televisión privada' => 'Televisión privada'
        );

        $prensa = array(
            'Orbe' => 'Orbe', 
            'Diario del sur' => 'Diario del sur', 
            'Zona libre' => 'Zona libre'
        );

        $papeleria = array(
            'Diplomas' => 'Diplomas', 
            'Constancias' => 'Constancias', 
            'Reconocimientos' => 'Reconocimientos', 
            'Gafetes' => 'Gafetes', 
            'Personificadores' => 'Personificadores', 
            'Trípticos' => 'Trípticos', 
            'Invitaciones' => 'Invitaciones', 
            'Dípticos' => 'Dípticos', 
            'Cartel' => 'Cartel', 
            'Avisos doble carta' => 'Avisos doble carta', 
            'Folders' => 'Folders', 
            'Tarjetas' => 'Tarjetas', 
            'Avisos tamaño carta' => 'Avisos tamaño carta'
        );

        $invitacion_interna = array(
            'Directivos docentes' => 'Directivos docentes', 
            'Funcionarios docentes' => 'Funcionarios docentes', 
            'Presidente de academia' => 'Presidente de academia', 
            'Personal docente' => 'Personal docente', 
            'Sindicato' => 'Sindicato', 
            'Personal de apoyo y asistencia a la educación' => 'Personal de apoyo y asistencia a la educación', 
            'Sociedad de alumnos' => 'Sociedad de alumnos'
        );

        $invitacion_externa = array(
            'Autoridades educativas' => 'Autoridades educativas', 
            'Autoridades federales' => 'Autoridades federales', 
            'Autoridades estatales' => 'Autoridades estatales', 
            'Autoridades municipales' => 'Autoridades municipales', 
            'Presidentes de colegios y asociaciones' => 'Presidentes de colegios y asociaciones', 
            'Empresarios' => 'Empresarios', 
            'Directores de instituciones de prensa' => 'Directores de instituciones de prensa'
        );
    ?>

    <div class="form-group">
        <div class="row">
            <h5><b>I. DIFUSIÓN DEL EVENTO</b></h5>
            <div class="col-md-4">
                <?= $form->field($model, 'cobertura')->checkboxList($cobertura, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'television')->checkboxList($television, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'prensa')->checkboxList($prensa, ['class' => 'checkbox']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <h5><b>Fotografías</b></h5>
                <?= $form->field($model, 'cantidad_fotografias')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <h5><b>II. IMPRESIÓN DE PAPELERÍA</b></h5>
            <div class="col-md-6">
                <?= $form->field($model, 'tipo_impresion')->checkboxList($papeleria, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-6">
                <h5><b>Reproducción de material</b></h5>
                <div class="col-md-6">
                    <?= $form->field($model, 'cantidad_duplicados')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'cantidad_copias')->textInput(['type' => 'number', 'placeholder' => 'Ingrese cantidad']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <h5><b>III. INVITACIONES</b></h5>
            <div class="col-md-6">
                <?= $form->field($model, 'invitacion_interna')->checkboxList($invitacion_interna, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'invitacion_externa')->checkboxList($invitacion_externa, ['class' => 'checkbox']) ?>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'departamento')->dropDownList(ArrayHelper::map(Organigrama::find()->all(), 'clave_area', 'p_sustantivos'),['prompt' => 'Seleccione el departamento encargado']) ?>

    <?= $form->field($model, 'id_portada')->hiddenInput(['value' => $id_portada]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Añadir anexo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

        <?= $model->isNewRecord ? Html::a('Omitir este anexo', ['protocolo/create', 'id_portada' => $id_portada], ['class' => 'btn btn-warning', 'style' => 'margin-left:50px;']) : ""; ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
