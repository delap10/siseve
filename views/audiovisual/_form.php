<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Organigrama;

/* @var $this yii\web\View */
/* @var $model app\models\Audiovisual */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audiovisual-form">

    <?php 
    	$form = ActiveForm::begin(); 
    	$equipo_audiovisual = array(
    		'Proyector de acetatos' => 'Proyector de acetatos',
    		'Cañon' => 'Cañón',
    		'Reproductor de CD o MP3' => 'Reproductor de CD o MP3',
    		'DVD' => 'DVD',
    		'Videocasetera' => 'Videocasetera',
    		'Pantalla' => 'Pantalla',
    		'Apuntador laser' => 'Apuntador láser',
    		'Rotafolio' => 'Rotafolio'
    	);

    	$equipo_computo = array(
    		'Computadora' => 'Computadora',
    		'Laptop' => 'Laptop',
    		'Impresora' => 'Impresora',
    		'Cañon' => 'Cañón',
    		'Pantalla para cañon' => 'Pantalla para cañón'
    	);
    ?>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'equipo_audiovisual')->checkboxList($equipo_audiovisual, ['class' => 'checkbox']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'equipo_computo')->checkboxList($equipo_computo, ['class' => 'checkbox']) ?>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'departamento')->dropDownList(ArrayHelper::map(Organigrama::find()->all(), 'clave_area', 'p_sustantivos'),['prompt' => 'Seleccione el departamento encargado']) ?>

    <?= $form->field($model, 'id_portada')->hiddenInput(['value' => $id_portada]) ?>

    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Añadir anexo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

        <?= Html::a('Omitir este anexo', ['portada/index'], ['class' => 'btn btn-warning', 'style' => 'margin-left:50px;']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
