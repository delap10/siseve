<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Anexo3Recurso */

$this->title = 'Actividades de Recursos Materiales';
$this->params['breadcrumbs'][] = ['label' => 'Anexo3 Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
isset($_GET['p']) ? $id_portada = base64_decode($_GET['p']) : $id_portada = "";
?>
<div class="anexo3-recurso-create">
	<h1 class="text-center"><b>ANEXO III</b></h1>
    <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'id_portada' => $id_portada,
    ]) ?>

</div>
