<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var $model */
/** @var $users_staffs */
/** @var $conditions */
$this->title = 'Редактирование';
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-login edit_form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <label>Выберите сотрудника</label>
    <?= $form->field($model, 'user_staff_id')->dropdownList($users_staffs)->label(false);?>
    <label>Введите дату возрата книги</label>
    <?= $form->field($model, 'date')->Input('date')->label(false); ?>
    <label>Выберите состояние книги</label>
    <?= $form->field($model, 'condition_id')->dropdownList($conditions)->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton("Редактировать", ['class' => 'add_form']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
