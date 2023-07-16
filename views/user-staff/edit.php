<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var $model */
/** @var $staffs */


use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fio')->textInput() ?>
    <?= $form->field($model, 'staff_id')->dropdownList($staffs);?>    <div class="form-group">
        <?= Html::submitButton("редактировать") ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
