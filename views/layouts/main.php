<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\assets\PublicAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

PublicAsset::register($this);
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
    <link rel="shortcut icon" href="/public/images/favicon.ico?v=<?= time(); ?>" type="image/x-icon">
</head>

<body>
    <?php $this->beginBody() ?>

    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid col-md-8">
            <a class="navbar-brand fw-bold" href="/">
                <img src="/public/images/logo.svg?v=<?= time(); ?>" alt="Logo" class="d-inline-block align-top" style="height: 55px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fs-4 fw-bold " id="offcanvasNavbarLabel">Меню</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <aside role="search" class="mt-3">
                        <?php
                        $form = \yii\widgets\ActiveForm::begin([
                            'method' => 'get',
                            'action' => Url::to(['site/search']),
                            'options' => ['role' => 'form', 'class' => 'd-flex'],
                        ]);
                        ?>
                        <?= $form->field(new \app\models\SearchForm(), 'text', [
                            'options' => ['class' => 'flex-grow-1 me-2'],
                        ])->textInput([
                            'class' => 'form-control',
                            'placeholder' => 'Введіть текст...',
                            'aria-label' => 'Пошук',
                        ])->label(false); ?>
                        <button class="btn btn-search " type="submit">Пошук</button>
                        <?php \yii\widgets\ActiveForm::end(); ?>
                    </aside>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 ">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" style="padding-top: 50px;" aria-current="page" href="/">Головна</a>
                        </li>
                        <?php if (Yii::$app->user->isGuest) : ?>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="<?= Url::toRoute(['auth/login']) ?>">Вхід</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="<?= Url::toRoute(['auth/signup']) ?>">Реєстрація</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <?= Html::beginForm(['/auth/logout'], 'post', ['class' => 'd-flex']) ?>
                                <?= Html::submitButton(
                                    'Вийти (' . Yii::$app->user->identity->name . ')',
                                    ['class' => 'btn btn-link nav-link fw-bold']
                                ) ?>
                                <?= Html::endForm() ?>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </div>
    </nav>







    <div class="content">
        <?= $content ?>
    </div>

    <footer class="footer-widget-section bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <!-- Логотип і про нас -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <aside class="footer-widget text-center text-md-start">
                        <img src="/public/images/logo_black.svg?v=<?= time(); ?>" alt="Логотип PixelTail" class="img-fluid mb-3" style="width: 250px; ">
                        <p class="text-muted small" style="color: rgb(121 121 121) !important;">Відкривайте неймовірну фотографію та пізнавальні статті. Приєднуйтесь до нас, досліджуючи світ через об'єктив.</p>
                        <p class="mt-3 small">
                            <i class="bi bi-geo-alt me-2"></i>123 Вулиця Фотографії, Місто Образів, WP
                            <br>
                            <i class="bi bi-envelope me-2"></i>contact@photoblog.com
                        </p>
                    </aside>
                </div>

                <!-- Популярні категорії -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <aside class="footer-widget" style="padding-top: 150px;">
                        <h5 class="text-uppercase fw-bold text-center text-md-start">Популярні категорії</h5>
                        <ul class="list-unstyled mt-3">
                            <li><a href="http://kurlicart.loc/site/category?id=1#" class="text-white text-decoration-none">Техніка і обладнання</a></li>
                            <li><a href="http://kurlicart.loc/site/category?id=2#" class="text-white text-decoration-none">Поради та уроки</a></li>
                            <li><a href="http://kurlicart.loc/site/category?id=3#" class="text-white text-decoration-none">Натхнення</a></li>
                            <li><a href="http://kurlicart.loc/site/category?id=4#" class="text-white text-decoration-none">Обробка фото</a></li>
                            <li><a href="http://kurlicart.loc/site/category?id=5#" class="text-white text-decoration-none">Жанри фотографії</a></li>
                        </ul>
                    </aside>
                </div>


                <div class="col-md-4">
                    <aside class="footer-widget" style="padding-top: 150px;">
                        <h5 class="text-uppercase fw-bold text-center text-md-start">Автори</h5>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-3">
                                <a href="#" class="d-flex align-items-center text-decoration-none text-white">
                                    <img src="/public/images/blog-1.jpg" alt="Ескіз посту" class="img-fluid rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                    <span>Дослідження "Золотої години" у фотографії</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="#" class="d-flex align-items-center text-decoration-none text-white">
                                    <img src="/public/images/blog-2.jpg" alt="Ескіз посту" class="img-fluid rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                    <span>Топ-5 порад для фотографії дикої природи</span>
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>

            <!-- Підвал -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p class="text-muted small mb-0" style="color: rgb(121 121 121) !important;">&copy; <?= date('Y') ?> PixelTales. Артеменко Денис ✲ Лічуєва Людмила ✲ ІТ.м-42 </p>
                </div>
            </div>
        </div>
    </footer>





    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>