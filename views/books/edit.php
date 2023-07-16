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

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'article')->textInput() ?>
    <?= $form->field($model, 'date')->Input('date') ?>
    <?= $form->field($model, 'author')->textInput() ?>
    <?= $form->field($model, 'count')->Input('number') ?>
    <div class="form-group">
        <?= Html::submitButton("редактировать") ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
