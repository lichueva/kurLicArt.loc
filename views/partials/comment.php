<?php if (!empty($comments)) : ?>

    <?php foreach ($comments as $comment) : ?>
        <div class="card mb-3 shadow-sm rounded-3 border-0">
            <div class="card-body d-flex align-items-start">
                <img width="50" class="rounded-circle me-3" src="<?= $comment->user->image; ?>" alt="Avatar">

                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fs-5"><?= $comment->user->name; ?></h5>
                        <span class="text-muted small"><?= $comment->getDate(); ?></span>
                    </div>

                    <p class="card-text fs-6"><?= $comment->text; ?></p>

                    <!-- Відповісти -->
                    <a href="#" class="btn btn-outline-primary btn-sm">Відповісти</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

<?php endif; ?>

<!-- end bottom comment-->

<?php if (!Yii::$app->user->isGuest) : ?>
    <div class="leave-comment card shadow-lg rounded-3 p-4 mb-4 border-0">
        <h4 class="mb-3 fs-4">Залишити відповідь</h4>

        <?php if (Yii::$app->session->getFlash('comment')) : ?>
            <div class="alert alert-success mb-3" role="alert">
                <?= Yii::$app->session->getFlash('comment'); ?>
            </div>
        <?php endif; ?>

        <?php $form = \yii\widgets\ActiveForm::begin([
            'action' => ['site/comment', 'id' => $article->id],
            'options' => ['class' => 'form', 'role' => 'form']
        ]) ?>

        <div class="mb-3">
            <?= $form->field($commentForm, 'comment')->textarea([
                'class' => 'form-control rounded-3 shadow-sm',
                'placeholder' => 'Напишіть ваш коментар...',
                'rows' => 4
            ])->label(false); ?>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100">Коментувати</button>

        <?php \yii\widgets\ActiveForm::end(); ?>
    </div><!--end leave comment-->
<?php endif; ?>