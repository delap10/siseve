<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PortadaEvento */

$this->title = 'Formato para el registro de eventos';
$this->params['breadcrumbs'][] = ['label' => 'Portada Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portada-evento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
