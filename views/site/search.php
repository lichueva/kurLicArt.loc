<?php

use yii\widgets\ListView;
use yii\helpers\Html;

$this->title = 'Результати пошуку';
?>

<div class="container mt-5">
    <h1 class="mb-4">Результати пошуку</h1>

    <div class="search-container mb-5">
        <?= Html::beginForm(['site/search'], 'get', ['class' => 'd-flex align-items-center']) ?>

        <?= Html::textInput('SearchForm[text]', $searchForm->text, [
            'class' => 'form-control me-3 shadow-sm border-0 rounded-3',
            'placeholder' => 'Введіть текст для пошуку...',
            'style' => 'max-width: 600px; font-size: 14px;'
        ]) ?>

        <?= Html::submitButton('Пошук', [
            'class' => 'btn btn-primary rounded-3 px-4 py-2 shadow-sm',
            'style' => 'font-size: 14px;'
        ]) ?>

        <?= Html::endForm() ?>
    </div>

    <?php if ($dataProvider) : ?>
        <div class="search-results">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_article', // Файл для відображення статті
                'layout' => "{items}\n{pager}",
                'options' => ['class' => 'list-unstyled'],
            ]); ?>
        </div>
    <?php else : ?>
        <p>Результатів не знайдено :(</p>
    <?php endif; ?>
</div>