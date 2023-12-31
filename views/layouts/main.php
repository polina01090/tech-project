<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => 'Книжный каталог',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $linkItems = [
        ['label' => 'Главная', 'url' => ['/books/list']],
    ];
    if (!Yii::$app->user->isGuest) {

        $linkItems[] = [
            'label' => 'Поиск',
            'items' => [
                ['label' => 'Книг', 'url' => ['/books/search']],
                ['label' => 'Клиентов', 'url' => ['/user-client/search']],
            ]
        ];
        $linkItems[] = [
            'label' => 'Настройки',
            'items' => [
                ['label' => 'Должности', 'url' => ['/staff/list']],
                ['label' => 'Состояния книг', 'url' => ['/condition/list']],
            ]
        ];
        $linkItems[] = [
            'label' => 'Добавление',
            'items' => [
                ['label' => 'Добаление книг', 'url' => ['/books/add']],
                ['label' => 'Добаление должностей', 'url' => ['/staff/add']],
                ['label' => 'Добаление состояния книг', 'url' => ['/condition/add']],
            ]
        ];
        $linkItems[] = [
            'label' => 'Книги',
            'items' => [
                ['label' => 'Список книг', 'url' => ['/books/list']],
                ['label' => 'Список выданных книг', 'url' => ['/books-out/list']],
                ['label' => 'Возрат книг', 'url' => ['/books-back/list']],
            ]
        ];
        $linkItems[] = [
            'label' => 'Клиенты',
            'items' => [
                ['label' => 'Список клиентов', 'url' => ['/user-client/list']],
                ['label' => 'Добавление клиентов', 'url' => ['/user-client/add']],
            ]
        ];
        $linkItems[] = [
            'label' => 'Сотрудники',
            'items' => [
                ['label' => 'Список сотрудников', 'url' => ['/user-staff/list']],
                ['label' => 'Добавление сотрудников', 'url' => ['/user-staff/add']],
            ]
        ];
        $linkItems[] = (
            '<li>'
            . Html::beginForm(['/user/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Выход (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        );
    } else {
        $linkItems[] = ['label' => 'Вход', 'url' => ['/user/login']];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $linkItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
