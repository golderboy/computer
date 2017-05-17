<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Work $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="work-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'work_date' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATE]],

            'work_title' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Work Title...', 'maxlength' => 250]],

            'user_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter User ID...']],

            'dep_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Dep ID...']],

            'd_update' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'work_end_date' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATE]],

            'item_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Item ID...']],

            'sta_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Sta ID...']],

            'work_user_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Work User ID...']],

            'work_user_text' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Enter Work User Text...','rows' => 6]],

            'work_text' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Enter Work Text...','rows' => 6]],

            'work_code' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Work Code...', 'maxlength' => 25]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
