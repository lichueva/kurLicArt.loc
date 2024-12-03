<?php

use yii\helpers\Url;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="padding-top: 20px;">
                <article class="post mb-5 rounded">
                    <div class="post-thumb mb-2 rounded shadow" style="max-width: 500px; margin: 0 auto;">
                        <a>
                            <img src="<?= $article->getImage(); ?>" alt="" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center mb-3">
                            <h6 class="text-uppercase text-muted mb-2">
                                <a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]) ?>" class="badge bg-secondary text-decoration-none"><?= $article->category->title ?></a>
                            </h6>
                            <h1 class="entry-title fw-bold fw-1"><?= $article->title ?></h1>
                        </header>
                        <div class="entry-content mb-4">
                            <p class="text-justify lh-lg"><?= $article->content ?></p>
                        </div>
                        <div class="social-share d-flex justify-content-between align-items-center border-top pt-3">
                            <span class="text-muted small">Автор: <strong><?= $article->author->name ?></strong> | <?= $article->getDate(); ?></span>
                            <span class="text-muted small">Теги:
                                <?php foreach ($article->tags as $tag): ?>
                                    <a href="<?= Url::to(['site/search-by-tag', 'id' => $tag->id]) ?>" class="badge text-bg-dark">
                                        <?= $tag->title ?>
                                    </a>
                                <?php endforeach; ?>
                            </span>
                        </div>
                    </div>
                </article>



                <?= $this->render('/partials/comment', [
                    'article' => $article,
                    'comments' => $comments,
                    'commentForm' => $commentForm
                ]) ?>
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