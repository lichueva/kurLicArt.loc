<?php

use yii\widgets\ListView;
use yii\helpers\Html;

$this->title = 'Search Results54';
?>

<h1>Результати пошуку</h1>

<div>
    <?= Html::beginForm(['site/search'], 'get', ['class' => 'search-form']) ?>
    <?= Html::textInput('SearchForm[text]', $searchForm->text, ['class' => 'form-control', 'placeholder' => 'Search']) ?>
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::endForm() ?>
</div>

<?php if ($dataProvider): ?>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_article', // Файл для відображення статті
        'layout' => "{items}\n{pager}",
    ]); ?>
<?php else: ?>
    <p>No results found.</p>
<?php endif; ?>