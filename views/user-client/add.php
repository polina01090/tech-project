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

    <?= $form->field($model, 'fio')->textInput() ?>
    <?= $form->field($model, 'seriesNumbers')->Input('number') ?>

    <div class="form-group">
        <?= Html::submitButton("Добавить") ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>