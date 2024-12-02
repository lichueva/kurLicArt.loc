<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\PublicAsset;
use yii\widgets\LinkPager;

/** @var $model app\models\Article */
/** @var $model app\models\Category */
PublicAsset::register($this);
?>
<div class="card">
    <div class="card-header">
        <?= Html::encode($model->category->title ?? 'Без категорії') ?> <!-- Відображення категорії -->
    </div>
    <div class="card-body">
        <h5 class="card-title fw-bold text-purple"><?= Html::encode($model->title) ?></h5> <!-- Заголовок статті жирним і фіолетовим -->
        <p class="card-text"><?= Html::encode($model->description) ?></p> <!-- Опис статті -->
        <a href="<?= Url::to(['site/view', 'id' => $model->id]) ?>" class="btn btn-purple text-white">Детальніше</a> <!-- Кнопка фіолетового кольору з білим текстом -->
    </div>
</div>