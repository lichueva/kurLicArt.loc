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
        <div class="row"> <!-- Сітка Bootstrap -->
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_article', // Шаблон відображення статті
                'layout' => "{items}\n<div class='mt-4'>{pager}</div>", // Макет із елементами та пагінацією
                'options' => ['class' => 'row'], // Контейнер для елементів
                'itemOptions' => ['class' => 'col-md-4 mb-4'], // Колонки Bootstrap
                'pager' => [
                    'options' => ['class' => 'pagination justify-content-center mt-4'], // Центрування пагінації
                    'linkOptions' => ['class' => 'page-link'], // Стиль для посилань пагінації
                    'activePageCssClass' => 'active', // Активна сторінка
                    'disabledPageCssClass' => 'disabled', // Вимкнена сторінка
                ],
            ]); ?>
        </div>
    <?php else : ?>
        <p class="text-center text-muted">Результатів не знайдено :(</p>
    <?php endif; ?>

</div>