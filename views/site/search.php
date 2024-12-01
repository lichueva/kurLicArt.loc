<?php

use yii\widgets\ListView;
use yii\helpers\Html;

$this->title = 'Результати пошуку';
?>

<div class="container my-5">
    <h1 class="mb-5 text-center fw-bold text-secondary">Результати пошуку</h1>

    <!-- Пошукова форма -->
    <div class="search-container mb-4">
        <?= Html::beginForm(['site/search'], 'get', ['class' => 'd-flex justify-content-center']) ?>

        <?= Html::textInput('SearchForm[text]', $searchForm->text, [
            'class' => 'form-control me-3',
            'placeholder' => 'Введіть текст для пошуку...',
            'style' => 'max-width: 500px;'
        ]) ?>

        <?= Html::submitButton('Пошук', [
            'class' => 'btn btn-primary px-4',
        ]) ?>

        <?= Html::endForm() ?>
    </div>

    <!-- Результати пошуку -->
    <?php if ($dataProvider->getTotalCount() > 0) : ?>
        <div class="search-results mt-5">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_article', // Шаблон відображення однієї статті
                'layout' => "{items}\n<div class='mt-4'>{pager}</div>",
                'options' => ['class' => 'list-unstyled'],
                'itemOptions' => ['class' => 'search-item mb-4 p-3 bg-white rounded-4'], // Видалено shadow-sm
                'pager' => [
                    'options' => ['class' => 'pagination justify-content-center'],
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