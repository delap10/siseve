<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Audiovisual */

$this->title = 'Equipo Audiovisual';
$this->params['breadcrumbs'][] = ['label' => 'Audiovisuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
isset($_GET['p']) ? $id_portada = base64_decode($_GET['p']) : $id_portada = "";
?>
<div class="audiovisual-create">
	<h1 class="text-center">ANEXO IV</h1>
    <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'id_portada' => $id_portada,
    ]) ?>

</div>
