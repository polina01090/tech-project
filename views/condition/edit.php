<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var $model */
$this->title = 'Редактирование состояния книги';

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-login edit_form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <label>Введите название</label>
    <?= $form->field($model, 'name')->textInput()->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton("Редактировать") ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
