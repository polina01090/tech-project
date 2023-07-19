<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var $model */
/** @var $users_staffs */
/** @var $condition */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'user_staff_id')->dropdownList($users_staffs);?>
    <?= $form->field($model, 'date')->Input('date') ?>
    <?= $form->field($model, 'condition_id')->dropdownList($condition) ?>

    <div class="form-group">
        <?= Html::submitButton("Добавить") ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
