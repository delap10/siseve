<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\PortadaEvento */

$this->title = 'Update Portada Evento: ' . $model->id_portada_evento;
$this->params['breadcrumbs'][] = ['label' => 'Portada Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_portada_evento, 'url' => ['view', 'id' => $model->id_portada_evento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portada-evento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
