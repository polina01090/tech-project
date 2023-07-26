<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var $model */
$this->title = 'Редактирование книги';
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-login edit_form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <label>Введите название книги</label>
    <?= $form->field($model, 'name')->textInput()->label(false);?>
    <label>Введите артикул товара</label>
    <?= $form->field($model, 'article')->textInput()->label(false); ?>
    <label>Введите дату поступления</label>
    <?= $form->field($model, 'date')->Input('date')->label(false); ?>
    <label>Введите Автора</label>
    <?= $form->field($model, 'author')->textInput()->label(false); ?>
    <label>Введите количество книг</label>
    <?= $form->field($model, 'count')->Input('number')->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton("Редактировать", ['class' => 'add_form']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
