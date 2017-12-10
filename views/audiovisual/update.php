<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Audiovisual */

$this->title = 'Update Audiovisual: ' . $model->id_anexo_4_audiovisual;
$this->params['breadcrumbs'][] = ['label' => 'Audiovisuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_anexo_4_audiovisual, 'url' => ['view', 'id' => $model->id_anexo_4_audiovisual]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="audiovisual-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
