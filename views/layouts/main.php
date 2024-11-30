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
</head>

<body>
    <?php $this->beginBody() ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand fw-bold" href="/">
                    <img src="/public/images/logo.png?v=<?= time(); ?>" alt="Logo" class="d-inline-block align-top" style="height: 40px;">
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-4">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="/">Головна</a>
                    </li>
                </ul>
                <?php if (Yii::$app->user->isGuest) : ?>
                    <ul class="navbar-nav mb-2 mb-lg-0 fs-4">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= Url::toRoute(['auth/login']) ?>">Вхід</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= Url::toRoute(['auth/signup']) ?>">Реєстрація</a>
                        </li>
                    </ul>
                <?php else : ?>
                    <?= Html::beginForm(['/auth/logout'], 'post', ['class' => 'd-flex']) ?>
                    <?= Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->name . ')',
                        ['class' => 'btn btn-link nav-link fs-4 fw-bold']
                    ) ?>
                    <?= Html::endForm() ?>
                <?php endif; ?>
                <form class="d-flex ms-3" role="search" method="get" action="<?= Url::to(['site/search']) ?>">
                    <input class="form-control me-2 fs-4" type="search" name="text" placeholder="Що шукаємо?" aria-label="Пошук">
                    <button class="btn btn-outline-primary fs-4 fw-bold" type="submit">Пошук</button>
                </form>
            </div>
        </div>
    </nav>




    <div class="content">
        <?= $content ?>
    </div>

    <footer class="footer-widget-section bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <aside class="footer-widget">
                        <div class="about-img">
                            <img src="/public/images/logo2.png" alt="">
                        </div>
                        <div class="about-content mt-3">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                            ut labore et dolore magna aliquyam erat, sed voluptua.
                        </div>
                        <div class="address mt-3">
                            <h4>Contact Info</h4>
                            <p>14529/12 NK Streets, DC, KZ</p>
                            <p>Phone: +123 456 78900</p>
                            <p>Email: info@mytreasure.com</p>
                        </div>
                    </aside>
                </div>
                <div class="col-md-4">
                    <aside class="footer-widget">
                        <h4>Testimonials</h4>
                        <div class="carousel slide" id="testimonialsCarousel" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p>
                                    <strong>Sophia, CEO ReadyTheme</strong>
                                </div>
                                <div class="carousel-item">
                                    <p>At vero eos et accusam justo duo dolores et ea rebum.</p>
                                    <strong>John, Manager</strong>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </aside>
                </div>
                <div class="col-md-4">
                    <aside class="footer-widget">
                        <h4>Custom Category Post</h4>
                        <div class="custom-post">
                            <a href="#">
                                <img src="/public/images/footer-img.png" alt="" class="img-fluid rounded mb-2">
                            </a>
                            <a href="#" class="text-white text-decoration-none">Home is Peaceful Place</a>
                            <p class="text-muted">February 15, 2016</p>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>