<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!--main content start-->
<div class="main-content pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="padding-top: 20px;">
                <?php foreach ($articles as $article) : ?>
                    <article class="card border-0 shadow-sm mb-4 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-4 position-relative">
                                <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="post-thumb h-100 d-block">
                                    <img src="<?= $article->getImage(); ?>" class="img-fluid h-100 object-fit-cover" alt="<?= $article->title ?>">
                                    <div class="post-thumb-overlay">
                                        <span class="text-uppercase text-white fw-bold">Переглянути</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]) ?>" class="badge bg-secondary text-decoration-none">
                                            <?= $article->category->title; ?>
                                        </a>
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fa fa-eye text-muted"></i>
                                            <span class="text-muted small"><?= (int) $article->viewed ?></span>
                                        </div>
                                    </div>

                                    <h2 class="h4 fw-bold mb-3">
                                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="text-dark text-decoration-none">
                                            <?= $article->title ?>
                                        </a>
                                    </h2>

                                    <p class="text-muted mb-3">
                                        <?= $article->description ?>
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="text-muted small">
                                                <i class="fa fa-user me-1"></i>
                                                <?= $article->author->name; ?>
                                            </span>
                                            <span class="text-muted small">
                                                <i class="fa fa-calendar me-1"></i>
                                                <?= $article->getDate(); ?>
                                            </span>
                                        </div>

                                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="btn btn-outline-purple btn-medium">
                                            Читати
                                        </a>
                                    </div>
                                </div>
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