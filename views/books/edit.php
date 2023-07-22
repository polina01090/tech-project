<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['class' => 'add_form']) ?>
    <?= $form->field($model, 'article')->textInput(['class' => 'add_form']) ?>
    <?= $form->field($model, 'date')->Input('date', ['class' => 'add_form']) ?>
    <?= $form->field($model, 'author')->textInput(['class' => 'add_form']) ?>
    <?= $form->field($model, 'count')->Input('number', ['class' => 'add_form']) ?>

    <div class="form-group">
        <?= Html::submitButton("Редактировать", ['class' => 'add_form']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
