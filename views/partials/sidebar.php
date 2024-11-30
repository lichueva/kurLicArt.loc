<?php

use yii\helpers\Url;
?>
<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        <!-- Popular Posts Widget -->
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center mb-4">Популярні пости</h3>
            <?php foreach ($popular as $article) : ?>
                <div class="popular-post mb-3">
                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="popular-img">
                        <img src="<?= $article->getImage(); ?>" alt="" class="img-fluid rounded">
                        <div class="p-overlay"></div>
                    </a>
                    <div class="p-content">
                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="text-uppercase d-block mb-2"><?= $article->title ?></a>
                        <span class="p-date text-muted"><?= $article->getDate(); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>

        <!-- Recent Posts Widget -->
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center mb-4">Нещодавні публікації</h3>
            <?php foreach ($recent as $article) : ?>
                <div class="thumb-latest-posts mb-3">
                    <div class="media">
                        <div class="media-left">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="popular-img">
                                <img src="<?= $article->getImage(); ?>" alt="" class="img-fluid rounded">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div class="media-body p-content">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>" class="text-uppercase d-block mb-2"><?= $article->title ?></a>
                            <span class="p-date text-muted"><?= $article->getDate(); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>

        <!-- Categories Widget -->
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center mb-4">Категорії</h3>
            <ul class="list-unstyled">
                <?php foreach ($categories as $category) : ?>
                    <li class="mb-2">
                        <a href="<?= Url::toRoute(['site/category', 'id' => $category->id]); ?>" class="d-flex justify-content-between text-decoration-none"><?= $category->title ?>
                            <span class="post-count text-muted">(<?= $category->getArticlesCount(); ?>)</span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </aside>

    </div>
</div>