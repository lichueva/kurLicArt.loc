<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'PixelTales',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-lg navbar-dark bg-dark fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto'],
            'items' => [
                ['label' => 'Головна', 'url' => ['/admin/default/index']],
                ['label' => 'Статті', 'url' => ['/admin/article/index']],
                ['label' => 'Коментарі', 'url' => ['/admin/comment/index']],
                ['label' => 'Категорії', 'url' => ['/admin/category/index']],
                ['label' => 'Теги', 'url' => ['/admin/tag/index']],
            ],
        ]);
        NavBar::end();
        ?>

        <div class="container mt-5 pt-5">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>




    <?php $this->endBody() ?>
    <?php $this->registerJsFile('/ckeditor/ckeditor.js'); ?>
    <?php $this->registerJsFile('/ckfinder/ckfinder.js'); ?>
    <script>
        $(document).ready(function() {
            var editor = CKEDITOR.replaceAll();
            CKFinder.setupCKEditor(editor);
        })
    </script>
</body>

</html>
<?php $this->endPage() ?>