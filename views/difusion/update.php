<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Difusion */

$this->title = 'Update Difusion: ' . $model->id_anexo_1_difusion;
$this->params['breadcrumbs'][] = ['label' => 'Difusions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_anexo_1_difusion, 'url' => ['view', 'p' => $model->id_anexo_1_difusion]];
$this->params['breadcrumbs'][] = 'Update';
isset($_GET['id']) ? $id_portada = base64_decode($_GET['id']) : $id_portada = "";
?>
<div class="difusion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id_portada' => $id_portada,
    ]) ?>

</div>
