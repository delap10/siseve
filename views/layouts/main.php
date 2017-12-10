<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php
        $this->head();
        /*$this->registerJsFile(
            '@web/js/jquery.min.js',
            ['depends' => [\yii\web\JqueryAsset::className()]]
        );*/
        /*$this->registerCssFile("@web/css/site.css", [
            'depends' => [\yii\bootstrap\BootstrapAsset::className()],
        ]);*/
    ?>
</head>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?= Html::img('@web/img/logos/logosep1.png', ['width' => '254', 'height' => '90']) ?>
            </div>
            <div class="col-md-6">
                <p class="titulo1">Secretaría de Educación Pública</p><br />
                <p class="titulo1">TECNOLÓGICO NACIONAL DE MÉXICO</p> <br />
                <p class="titulo1"><span style="font-size:.9em">Instituto Tecnologico de Tapachula</span></p> <br />
            </div>
        </div>
    </div>
</header>

<body>
<?php $this->beginBody() ?>

<div class="container">
    <?php
    NavBar::begin([
        'brandLabel' => 'SISEVE',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'container navbar-inverse',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Administrar eventos', 'url' => ['#'], 'items' => [
                ['label' => 'Agregar', 'url' => ['/site/agregar']],
                ['label' => 'Modificar', 'url' => ['#']],
                ['label' => 'Aprobar', 'url' => ['#']],
                ['label' => 'Seguimiento', 'url' => ['#']],
            ]],
            ['label' => 'Semana de Ingeniería', 'url' => ['/portada/index']],
            ['label' => 'Contacto', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="text-center">
            <?= Html::img('@web/img/logos/logosep1.png', ['width' => '254', 'height' => '90']) ?>
        </div>
        <br>
        <div class="text-center texto">
            <p><?= Yii::$app->params['instituto'] ?> &copy; <?= date('Y') ?></p>
            <p><?= Yii::$app->params['direccion1'] ?></p>
            <p><?= Yii::$app->params['direccion2'] ?></p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
