<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\WorkSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="work-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'work_id') ?>

    <?= $form->field($model, 'work_code') ?>

    <?= $form->field($model, 'work_date') ?>

    <?= $form->field($model, 'work_title') ?>

    <?= $form->field($model, 'item_id') ?>

    <?php // echo $form->field($model, 'work_user_text') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'dep_id') ?>

    <?php // echo $form->field($model, 'sta_id') ?>

    <?php // echo $form->field($model, 'work_user_id') ?>

    <?php // echo $form->field($model, 'work_text') ?>

    <?php // echo $form->field($model, 'work_end_date') ?>

    <?php // echo $form->field($model, 'd_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
