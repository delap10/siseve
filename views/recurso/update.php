<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anexo3Recurso */

$this->title = 'Update Anexo3 Recurso: ' . $model->id_anexo_3_recurso;
$this->params['breadcrumbs'][] = ['label' => 'Anexo3 Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_anexo_3_recurso, 'url' => ['view', 'id' => $model->id_anexo_3_recurso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anexo3-recurso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
