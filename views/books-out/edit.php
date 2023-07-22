<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var $model */
/** @var $users_staffs */
/** @var $users_client */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'user_staff_id')->dropdownList($users_staffs, ['class' => 'add_form']);?>
    <?= $form->field($model, 'user_client_id')->dropdownList($users_client, ['class' => 'add_form']);?>
    <?= $form->field($model, 'date')->Input('date', ['class' => 'add_form']) ?>
    <?= $form->field($model, 'date_deadline')->Input('date', ['class' => 'add_form']) ?>

    <div class="form-group">
        <?= Html::submitButton("Редактировать", ['class' => 'add_form']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
