<?php

use yii\widgets\ListView;
use yii\helpers\Html;

$this->title = 'Результати пошуку';
?>

<div class="container my-5">
    <h1 class="mb-5 text-center fw-bold text-purple">
        <?= isset($tagTitle) ? "Результати за тегом: " . Html::encode($tagTitle) : "Результати пошуку" ?>
    </h1>

    <!-- Пошукова форма -->
    <div class="search-container mb-4">
        <?= Html::beginForm(['site/search'], 'get', ['class' => 'd-flex justify-content-center']) ?>

        <?= Html::textInput('SearchForm[text]', $searchForm->text, [
            'class' => 'form-control me-3',
            'placeholder' => 'Введіть текст для пошуку...',
            'style' => 'max-width: 500px;'
        ]) ?>

        <?= Html::submitButton('Пошук', [
            'class' => 'btn btn-search',
        ]) ?>

        <?= Html::endForm() ?>
    </div>

    <!-- Результати пошуку -->
    <?php if ($dataProvider->getTotalCount() > 0) : ?>
        <div class="row">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_article',
                'layout' => "{items}\n<div class='mt-4'>{pager}</div>",
                'options' => ['class' => 'row'],
                'itemOptions' => ['class' => 'col-md-4 mb-4'],
                'pager' => [
                    'options' => ['class' => 'pagination justify-content-center mt-4'],
                    'linkOptions' => ['class' => 'page-link'],
                    'activePageCssClass' => 'active',
                    'disabledPageCssClass' => 'disabled',
                ],
            ]); ?>
        </div>
    <?php else : ?>
        <p class="text-center text-muted">Результатів не знайдено :(</p>
    <?php endif; ?>
</div>