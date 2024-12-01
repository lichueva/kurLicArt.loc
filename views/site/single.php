<?php

use yii\helpers\Url;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="padding-top: 20px;">
                <article class="post mb-5">
                    <div class="post-thumb mb-4 rounded shadow">
                        <a><img src="<?= $article->getImage(); ?>" alt="" class="img-fluid rounded"></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center mb-4">
                            <h6 class="text-uppercase text-muted">
                                <a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]) ?>" class="text-decoration-none"><?= $article->category->title ?></a>
                            </h6>
                            <h1 class="entry-title fw-bold"><?= $article->title ?></h1>
                        </header>
                        <div class="entry-content mb-4">
                            <p class="text-justify lh-lg"><?= $article->content ?></p>
                        </div>
                        <div class="social-share d-flex justify-content-between align-items-center border-top pt-3">
                            <span class="text-muted small">Автор: <strong><?= $article->author->name ?></strong> | <?= $article->getDate(); ?></span>
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