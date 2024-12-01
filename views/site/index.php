<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!--main content start-->
<div class="main-content pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($articles as $article) : ?>
                    <article class="post mb-4">
                        <div class="post-thumb position-relative overflow-hidden rounded shadow-lg">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><img src="<?= $article->getImage(); ?>" alt=""></a>

                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-white fw-bold">Переглянути</div>
                            </a>
                        </div>
                        <div class="card-body p-4">
                            <header class="entry-header text-center text-uppercase mb-4">
                                <h6><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]) ?>"> <?= $article->category->title; ?></a></h6>

                                <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><?= $article->title ?></a></h1>

                            </header>
                            <div class="entry-content mb-3">
                                <p><?= $article->description ?>
                                </p>

                                <div class="btn-continue-reading text-center">
                                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="more-link">Продовжити читання</a>
                                </div>
                            </div>
                            <div class="social-share mt-3 d-flex justify-content-between align-items-center">
                                <span class="social-share-title text-muted">Автор: <?= $article->author->name; ?> . <?= $article->getDate(); ?></span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed ?>
                                </ul>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

                <?php
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular' => $popular,
                'recent' => $recent,
                'categories' => $categories
            ]); ?>
        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->