<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Useradmin $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="useradmin-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'username' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Username...', 'maxlength' => 255]],

            'auth_key' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Auth Key...', 'maxlength' => 32]],

            'password_hash' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Password Hash...', 'maxlength' => 255]],

            'email' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Email...', 'maxlength' => 255]],

            'created_at' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Created At...']],

            'updated_at' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Updated At...']],

            'pname' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Pname...']],

            'sex' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Sex...']],

            'dep_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Dep ID...']],

            'status' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Status...']],

            'sta_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Sta ID...']],

            'password_reset_token' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Password Reset Token...', 'maxlength' => 255]],

            'fname' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Fname...', 'maxlength' => 200]],

            'lname' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Lanme...', 'maxlength' => 200]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
