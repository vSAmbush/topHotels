<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = 'TopHotels';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= Yii::$app->params['img_src']; ?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <!-- Header -->
    <header class="contain">

        <!-- Navigation -->
        <div class="up-part">
            <div class="logo pull-left">
                <?= Html::img(Yii::$app->params['img_src'].'/images/th-logo.png'); ?>
            </div>

            <div class="info">
                <a class="prof" href="#"><span>40%</span> - мой профиль</a>

                <span class="text-danger">1 сообщение</span>

                <a class="text-danger pull-right exit" href="#">Выйти</a>
            </div>

            <!-- Navigation List -->
            <div class="nav-block">
                <ul class="navigation">
                    <li class="tab <?= (Yii::$app->request->get('r') === 'application/index') ? 'active-tab' : '' ?>">
                        <a href="<?= \yii\helpers\Url::to(['application/index']); ?>">Мой профиль</a>
                    </li>
                    <li class="tab">
                        <a href="#">Каталог отелей</a>
                    </li>
                    <li class="tab">
                        <a href="#">Клуб ТопХотелс</a>
                    </li>
                    <li class="tab <?= (Yii::$app->request->get('r') === 'site/index') ? 'active-tab' : '' ?>">
                        <a href="<?= \yii\helpers\Url::to(['site/index']); ?>">Помощь в подборе</a>
                    </li>
                    <li class="tab">
                        <a href="#">Добавить отзыв</a>
                    </li>
                </ul>
            </div>

            <!-- Mobile Info -->
            <div class="mobile-messages">
                <i class="far fa-envelope" aria-hidden="true"></i>
                <a href="#" class="mob-message-contain">
                    <span>989</span>
                </a>
            </div>
        </div>

        <!-- Search -->
        <div class="down-part">

            <button class="key pull-left"><img src="<?= Yii::$app->params['img_src']; ?>/images/key-white.svg"></button>

            <?= Html::img(Yii::$app->params['img_src'].'/images/avatar.jpg', [
                    'class' => 'avatar',
            ]); ?>

            <!-- Dropdown -->
            <div class="dropdown pull-left">
                <button class="nav-button dropdown-toggle" type="button" data-toggle="dropdown">
                    <?= Html::img(Yii::$app->params['img_src'].'/images/menu-button.svg'); ?>
                </button>

                <ul class="dropdown-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['application/index']); ?>">Мой профиль</a></li>
                    <li><a href="#">Каталог отелей</a></li>
                    <li><a href="#">Клуб ТопХотелс</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['site/index']); ?>">Помощь в подборе</a></li>
                    <li><a href="#">Добавить отзыв</a></li>
                </ul>
            </div>

            <button class="mobile-search"><i class="fa fa-search"></i></button>

            <button class="cancel-search"><span class="glyphicon glyphicon-remove"></span></button>

            <?= Html::beginForm('', 'post', [
                    'class' => 'search-form',
            ]); ?>

                <?= Html::submitButton('<i class="fa fa-thumbs-up"></i>', [
                        'class' => 'btn-search',
                        'id' => 'btn-search',
                ]); ?>
                <div class="text-block">
                    <?= Html::textInput('', '', [
                            'placeholder' => 'Введите отель, город или страну',
                            'class' => 'text-input',
                    ]); ?>
                </div>

            <?= Html::endForm(); ?>

            <?= Html::beginForm('', 'post', [
                    'class' => 'pull-right lang-block',
            ]); ?>

                <div class="lang-sel"><?= (Yii::$app->request->post('language')) ? trim(Yii::$app->request->post('language')) : 'RUS' ?>
                    <input id="language" type="hidden" name="language">
                    <input id="language2" type="hidden" name="language2">
                    <span id="lang-sel" class="glyphicon glyphicon-chevron-down"></span>
                    <div class="eng child invis">
                        <?= (Yii::$app->request->post('language2')) ? trim(Yii::$app->request->post('language2')) : 'ENG' ?>
                    </div>
                </div>

                <?= Html::submitButton('', [
                        'class' => 'invis',
                        'id' => 'lang-submit',
                        'name' => 'lang-submit',
                ]); ?>
            <?= Html::endForm(); ?>
        </div>
    </header>

    <!-- Content -->
    <div class="content contain">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>

<!-- Footer -->
<footer class="foot contain">
    <div class="footer-alias">
        <p>&copy TOPHOTELS 2003-2018</p>
        <a href="#">правовая информация</a>
    </div>

    <div class="footer-description">
        Все права защищены. Перепечатка, включение информации, содержащейся в рекламных и иных материалах сайта, во всевозможные базы данных для дальнейшего их коммерческого использования, размещение таких материалов в любых СМИ и Интернете допускаются только с письменного разрешения редакции сайта. Предоставляемый сервис является информационным. Администрация сайта не несет ответственности за достоверность и качество информации, предоставляемой посетителями сайта, в том числе турфирмами и отельерами.
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
