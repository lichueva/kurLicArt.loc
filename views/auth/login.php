<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Вхід';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="leave-comment mr0"><!--leave comment-->
    <div class="row justify-content-center min-vh-90 align-items-center" style="
    padding-top: 56px;">
        <div class="col-md-6 col-lg-4">
            <div class="site-login p-4 border rounded shadow-sm">
                <h2 class="text-center mb-4"><?= Html::encode($this->title) ?></h2>

                <p class="text-center mb-3">Будь ласка, заповніть наступні поля для входу:</p>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "<div class=\"mb-3\">{label}\n{input}\n{error}</div>",
                        'labelOptions' => ['class' => 'form-label'],
                    ],
                ]); ?>

                <?= $form->field($model, 'email')->textInput(['type' => 'email', 'class' => 'form-control', 'placeholder' => 'Електронна пошта'])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Пароль'])->label(false) ?>


                <div class="d-grid gap-2">
                    <?= Html::submitButton('Увійти', ['class' => 'btn btn-search btn-lg', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

                <div class="text-center mt-3">
                    <small style="color:#999;">Немає акаунту? <a href="http://kurlicart.loc/auth/signup">Зареєстуватися</a></small>
                    </small>
                </div>
            </div>
        </div>

    </div>
</div>