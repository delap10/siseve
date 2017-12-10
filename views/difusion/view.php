<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Difusion */

$this->title = $model->id_anexo_1_difusion;
$this->params['breadcrumbs'][] = ['label' => 'Difusions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="difusion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_anexo_1_difusion, 'p' => base64_encode($model->id_portada)], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_anexo_1_difusion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_anexo_1_difusion',
            'cantidad_fotografias',
            'cobertura',
            'television',
            'prensa',
            'tipo_impresion',
            'cantidad_duplicados',
            'cantidad_copias',
            'invitacion_interna',
            'invitacion_externa',
            'departamento',
            'id_portada',
        ],
    ]) ?>

</div>
