<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Protocolo */

$this->title = $model->id_anexo_2_protocolo;
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protocolo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_anexo_2_protocolo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_anexo_2_protocolo], [
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
            'id_anexo_2_protocolo',
            'leyenda_lona:ntext',
            'recepcion',
            'honores_bandera',
            'centro_informacion',
            'atencion_presidium',
            'departamento',
            'id_portada',
        ],
    ]) ?>

</div>
