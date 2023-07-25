<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var $model */
/** @var $users_staffs */
/** @var $users_client */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-login edit_form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <label>Выберите сотрудника</label>
    <?= $form->field($model, 'user_staff_id')->dropdownList($users_staffs)->label(false);?>
    <label>Выберите клиента</label>
    <?= $form->field($model, 'user_client_id')->dropdownList($users_client)->label(false);?>
    <label>Введите дату сдачи книги клиенту</label>
    <?= $form->field($model, 'date')->Input('date')->label(false);?>
    <label>Срок возрата книги</label>
    <?= $form->field($model, 'date_deadline')->Input('date')->label(false);?>

    <div class="form-group">
        <?= Html::submitButton("Добавить", ['class' => 'add_form']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
