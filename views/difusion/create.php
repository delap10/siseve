<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Difusion */

$this->title = 'Difusión del Evento e Impresión de Papelería';
$this->params['breadcrumbs'][] = ['label' => 'Difusions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
isset($_GET['p']) ? $id_portada = base64_decode($_GET['p']) : $id_portada = "";
?>
<div class="difusion-create">
	
	<h1 class="text-center"><b>ANEXO 1</b></h1>
    <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'id_portada' => $id_portada,
    ]) ?>

</div>
