<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\assets\PublicAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Логотип -->
        <a class="navbar-brand" href="/">
            <img src="/public/images/logo.jpg" alt="">
        </a>

        <!-- Кнопка для мобільного меню -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Основне меню -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
            </ul>

            <!-- Правий блок (Авторизація) -->
            <ul class="navbar-nav ms-auto text-uppercase">
                <?php if (Yii::$app->user->isGuest): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::toRoute(['auth/login']) ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::toRoute(['auth/signup']) ?>">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <?= Html::beginForm(['/auth/logout'], 'post')
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->name . ')',
                                ['class' => 'btn btn-link nav-link logout', 'style' => "padding-top:0;"]
                            )
                            . Html::endForm() ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>



    <?= $content ?>


    <footer class="footer-widget-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <aside class="footer-widget">
                        <div class="about-img"><img src="/public/images/logo2.png" alt=""></div>
                        <div class="about-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                            eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed voluptua. At vero eos et
                            accusam et justo duo dlores et ea rebum magna text ar koto din.
                        </div>
                        <div class="address">
                            <h4 class="text-uppercase">contact Info</h4>

                            <p> 14529/12 NK Streets, DC, KZ</p>

                            <p> Phone: +123 456 78900</p>

                            <p>mytreasure.com</p>
                        </div>
                    </aside>
                </div>

                <div class="col-md-4">
                    <aside class="footer-widget">
                        <h3 class="widget-title text-uppercase">Testimonials</h3>

                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!--Indicator-->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="single-review">
                                        <div class="review-text">
                                            <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                                tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                                vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                                magna aliquyam eratma</p>
                                        </div>
                                        <div class="author-id">
                                            <img src="/public/images/author.png" alt="">

                                            <div class="author-text">
                                                <h4>Sophia</h4>

                                                <h4>CEO, ReadyTheme</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-review">
                                        <div class="review-text">
                                            <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                                tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                                vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                                magna aliquyam eratma</p>
                                        </div>
                                        <div class="author-id">
                                            <img src="/public/images/author.png" alt="">

                                            <div class="author-text">
                                                <h4>Sophia</h4>

                                                <h4>CEO, ReadyTheme</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-review">
                                        <div class="review-text">
                                            <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                                tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                                vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                                magna aliquyam eratma</p>
                                        </div>
                                        <div class="author-id">
                                            <img src="/public/images/author.png" alt="">

                                            <div class="author-text">
                                                <h4>Sophia</h4>

                                                <h4>CEO, ReadyTheme</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </aside>
                </div>
                <div class="col-md-4">
                    <aside class="footer-widget">
                        <h3 class="widget-title text-uppercase">Custom Category Post</h3>


                        <div class="custom-post">
                            <div>
                                <a href="#"><img src="/public/images/footer-img.png" alt=""></a>
                            </div>
                            <div>
                                <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                <span class="p-date">February 15, 2016</span>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <div class="footer-copy">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">&copy; 2015 <a href="#">Treasure PRO, </a> Built with <i
                                class="fa fa-heart"></i> by <a href="#">Rahim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>