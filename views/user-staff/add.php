<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var $model */
/** @var $staffs */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-login edit_form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <label>Введите ФИО</label>
    <?= $form->field($model, 'fio')->textInput()->label(false); ?>
    <label>Выберите должность</label>
    <?= $form->field($model, 'staff_id')->dropdownList($staffs)->label(false);;?>

    <div class="form-group">
        <?= Html::submitButton("Добавить", ['class' => 'add_form']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
