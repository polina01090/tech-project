<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var $model */
/** @var $books */
/** @var $users_staffs */
/** @var $users_client */


use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_id')->dropdownList($books);?>
    <?= $form->field($model, 'user_staff_id')->dropdownList($users_staffs);?>
    <?= $form->field($model, 'user_client_id')->dropdownList($users_client);?>
    <?= $form->field($model, 'date')->Input('date') ?>
    <?= $form->field($model, 'date_deadline')->Input('date') ?>
    <div class="form-group">
        <?= Html::submitButton("редактировать") ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
