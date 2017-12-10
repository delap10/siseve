<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Audiovisual */

$this->title = $model->id_anexo_4_audiovisual;
$this->params['breadcrumbs'][] = ['label' => 'Audiovisuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audiovisual-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_anexo_4_audiovisual], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_anexo_4_audiovisual], [
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
            'id_anexo_4_audiovisual',
            'equipo_audiovisual',
            'equipo_computo',
            'departamento',
            'id_portada',
        ],
    ]) ?>

</div>
