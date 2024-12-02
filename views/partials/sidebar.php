<?php

use yii\helpers\Url;
?>
<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">


        <!-- Popular Posts Widget -->

        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center mb-4 fw-bold">Популярні пости</h3>
            <?php foreach ($popular as $article) : ?>
                <div class="popular-post mb-3">
                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="post-thumb">
                        <img src="<?= $article->getImage(); ?>" alt="" class="img-fluid rounded sidebar-img">
                        <div class="post-thumb-overlay">
                            <span class="text-uppercase text-white fw-bold">Переглянути</span>
                        </div>
                    </a>
                    <div class="p-content">
                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="text-uppercase d-block mb-2"><?= $article->title ?></a>
                        <span class="p-date text-muted"><?= $article->getDate(); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>

        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center mb-4 fw-bold">Нещодавні публікації</h3>
            <?php foreach ($recent as $article) : ?>
                <div class="popular-post mb-3">
                    <div class="media-left">
                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="post-thumb">
                            <img src="<?= $article->getImage(); ?>" alt="" class="img-fluid rounded sidebar-img">
                            <div class="post-thumb-overlay">
                                <span class="text-uppercase text-white fw-bold">Переглянути</span>
                            </div>
                        </a>
                    </div>
                    <div class="p-content">
                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="text-uppercase d-block mb-2"><?= $article->title ?></a>
                        <span class="p-date text-muted"><?= $article->getDate(); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>


        <!-- Categories Widget -->
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center mb-4" fw-bold>Категорії</h3>
            <ul class="list-unstyled">
                <?php foreach ($categories as $category) : ?>
                    <li class="mb-2">
                        <a href="<?= Url::toRoute(['site/category', 'id' => $category->id]); ?>" class="d-flex justify-content-between text-decoration-none category-link">
                            <?= $category->title ?>
                            <span class="post-count text-muted">(<?= $category->getArticlesCount(); ?>)</span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </aside>

    </div>
</div>