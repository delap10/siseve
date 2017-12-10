<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Protocolo */

$this->title = 'Protocolos';
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
isset($_GET['p']) ? $id_portada = base64_decode($_GET['p']) : $id_portada = "";
?>
<div class="protocolo-create">
	<h1 class="text-center"><b>ANEXO II</b></h1>
    <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'id_portada' => $id_portada,
    ]) ?>

</div>
