<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Protocolo */

$this->title = 'Update Protocolo: ' . $model->id_anexo_2_protocolo;
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_anexo_2_protocolo, 'url' => ['view', 'id' => $model->id_anexo_2_protocolo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="protocolo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
