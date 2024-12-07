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
                                <a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]) ?>" class="badge bg-secondary text-decoration-none">
                                    <?= $article->category->title ?>
                                </a>
                            </h6>
                            <h1 class="entry-title fw-bold fw-1">
                                <?= $article->title ?>
                            </h1>
                        </header>
                        <div class="entry-content mb-4">
                            <p class="text-justify lh-lg">
                                <?= $article->content ?>
                            </p>
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
                            <button type="button" class="btn btn-light" id="share-button"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
                                    <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5" />
                                </svg></button>
                        </div>
                        <div class="share-button mt-3 text-center">

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

<!-- Toast Notification -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="copyToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Повідомлення</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Посилання скопійовано в буфер обміну!
        </div>
    </div>
</div>

<script>
    document.getElementById('share-button').addEventListener('click', function () {
        const url = "<?= Url::to(['site/view', 'id' => $article->id], true) ?>";

        if (navigator.clipboard && navigator.clipboard.writeText) {
            // Спроба скопіювати через API Clipboard
            navigator.clipboard.writeText(url).then(function () {
                const toast = new bootstrap.Toast(document.getElementById('copyToast'));
                toast.show();
            }).catch(function (error) {
                alert('Не вдалося скопіювати посилання: ' + error);
            });
        } else {
            // Резервний механізм через текстове поле
            const tempInput = document.createElement('input');
            tempInput.value = url;
            document.body.appendChild(tempInput);
            tempInput.select();
            try {
                document.execCommand('copy');
                const toast = new bootstrap.Toast(document.getElementById('copyToast'));
                toast.show();
            } catch (error) {
                alert('Не вдалося скопіювати посилання вручну: ' + error);
            }
            document.body.removeChild(tempInput);
        }
    });
</script>
