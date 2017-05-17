<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Computer $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="computer-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'item_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Item Name...', 'maxlength' => 255]],

            'd_update' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'item_reg' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATE]],

            'item_code' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Item Code...', 'maxlength' => 50]],

            'item_own' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Item Own...', 'maxlength' => 255]],

            'item_barnd' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Item Barnd...', 'maxlength' => 200]],

            'item_ip' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Item Ip...', 'maxlength' => 15]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
