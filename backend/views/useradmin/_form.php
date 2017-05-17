<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use app\models\Sex;
use app\models\Pname;
use app\models\Department;
use app\models\Userstatus;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usersadmin-form">

  <?php
       $form = kartik\widgets\ActiveForm::begin(
       [
           'id' => 'usersadmin-form',
       //    'enableAjaxValidation' => true,
           'fieldConfig' => [
             'autoPlaceholder'=>true

           ]

       ]);
   ?>
   <div class='row'>
   <div class='col-md-2'>
     <?php
         echo $form->field($model, 'pname')->widget(Select2::classname(), [
           'data' =>  ArrayHelper::map(Pname::find()->all(),'id','pname'),
           'options' => ['placeholder' => 'คำนำหน้า'],
           'pluginOptions' => [
             'allowClear' => true
             ],
           ]);
     ?>
   </div>
   <div class='col-md-5'>
      <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
   </div>
   <div class='col-md-5'>
      <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
   </div>
</div>
<div class='row'>
  <div class='col-md-2'>
    <?php
        echo $form->field($model, 'sex')->widget(Select2::classname(), [
          'data' =>  ArrayHelper::map(Sex::find()->all(),'sex','sexname'),
          'options' => ['placeholder' => 'เพศ'],
          'pluginOptions' => [
            'allowClear' => true
            ],
          ]);
    ?>
  </div>
  <div class='col-md-4'>
      <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
  </div>
  <div class='col-md-3'>
    <?php
        echo $form->field($model, 'dep_id')->widget(Select2::classname(), [
          'data' =>  ArrayHelper::map(Department::find()->all(),'dep_id','dep_name'),
          'options' => ['placeholder' => 'แผนก'],
          'pluginOptions' => [
            'allowClear' => true
            ],
          ]);
    ?>
  </div>
  <div class='col-md-3'>
    <?php
        echo $form->field($model, 'sta_id')->widget(Select2::classname(), [
          'data' =>  ArrayHelper::map(Userstatus::find()->all(),'sta_code','sta_name'),
          'options' => ['placeholder' => 'สถานะ'],
          'pluginOptions' => [
            'allowClear' => true
            ],
          ]);
    ?>
  </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
