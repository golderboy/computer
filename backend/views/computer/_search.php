<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\ComputerSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="computer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'item_id') ?>

    <?= $form->field($model, 'item_code') ?>

    <?= $form->field($model, 'item_name') ?>

    <?= $form->field($model, 'item_barnd') ?>

    <?= $form->field($model, 'item_ip') ?>

    <?php // echo $form->field($model, 'item_own') ?>

    <?php // echo $form->field($model, 'item_reg') ?>

    <?php // echo $form->field($model, 'd_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
