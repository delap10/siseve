<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Transporte */

$this->title = 'Transporte';
$this->params['breadcrumbs'][] = ['label' => 'Transportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
isset($_GET['a']) ? $id_anexo = base64_decode($_GET['a']) : $id_anexo = "";
isset($_GET['p']) ? $id_portada = base64_decode($_GET['p']) : $id_portada = "";
?>
<div class="transporte-create">

	<h1 class="text-center"><b>ANEXO III</b></h1>
    <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'id_anexo' => $id_anexo,
        'id_portada' => $id_portada,
    ]) ?>

</div>
