<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use dosamigos\ckeditor\CKEditor;
use app\models\Computer;
use common\models\User;
use app\models\Useradmin;
use app\models\Statuswork;
use app\models\Department;

/**
 * @var yii\web\View $this
 * @var app\models\Work $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="work-form">

  <?php
       $form = kartik\widgets\ActiveForm::begin(
       [
           'id' => 'workit-form',
       //    'enableAjaxValidation' => true,
           'fieldConfig' => [
             'autoPlaceholder'=>true

           ]

       ]);
   ?>
<div class='row'>
  <div class='col-md-2'>
    <?= $form->field($model, 'work_code')->textInput(['maxlength' => true]) ?>
  </div>
  <div class='col-md-6'>
    <?= $form->field($model, 'work_title')->textInput(['maxlength' => true,'readonly' => true]) ?>
  </div>
  <div class='col-md-4'>
    <?php echo DatePicker::widget([
          'model' => $model,
          'attribute' => 'work_date',
          'options' => ['placeholder' => 'วันที่แจ้ง','readonly' => true],
          'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-m-d',
            'todayHighlight'=> true,
          ]
        ]);
    ?>
  </div>

</div>
<div class='row'>
  <div class='col-md-4'>
    <?php
        echo $form->field($model, 'item_id')->widget(Select2::classname(), [
          'data' =>  ArrayHelper::map(Computer::find()->all(),'item_id','itemfname'),
          'options' => ['placeholder' => 'รายการอุปกรณ์'],
          'pluginOptions' => [
            'allowClear' => true
            ],
          ]);
    ?>
  </div>
  <div class='col-md-4'>
    <?php
        echo $form->field($model, 'user_id')->widget(Select2::classname(), [
          'data' =>  ArrayHelper::map(User::find()->all(),'id','username'),
          'options' => ['placeholder' => 'ผุ้แจ้ง'],
          'pluginOptions' => [
            'allowClear' => true
            ],
          ]);
    ?>
  </div>
  <div class='col-md-4'>
    <?php
        echo $form->field($model, 'dep_id')->widget(Select2::classname(), [
          'data' =>  ArrayHelper::map(Department::find()->all(),'dep_id','dep_name'),
          'options' => ['placeholder' => 'ฝ่าย'],
          'pluginOptions' => [
            'allowClear' => true
            ],
          ]);
    ?>
  </div>
</div>
<div class='row'>
  <div class='col-md-12'>
    <?= $form->field($model, 'work_user_text')->widget(CKEditor::className(), [
            'options' => ['rows' => 6,'readonly' => true],
            'preset' => 'full', //basic,standard,full
    ]);
    ?>
  </div>
</div>
<div class='row'>
  <div class='col-md-12'>
    <?= $form->field($model, 'work_text')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'full', //basic,standard,full
    ]);
    ?>
  </div>
</div>
<div class='row'>
  <div class='col-md-4'>
    <?php
        echo $form->field($model, 'work_user_id')->widget(Select2::classname(), [
          'data' =>  ArrayHelper::map(Useradmin::find()->where('sta_id = 0')->all(),'id','username'),
          'options' => ['placeholder' => 'ผู้รับเรื่อง'],
          'pluginOptions' => [
            'allowClear' => true
            ],
          ]);
    ?>
  </div>
  <div class='col-md-4'>
    <?php
        echo $form->field($model, 'sta_id')->widget(Select2::classname(), [
          'data' =>  ArrayHelper::map(Statuswork::find()->all(),'sta_id','sta_name'),
          'options' => ['placeholder' => 'สถานะ'],
          'pluginOptions' => [
            'allowClear' => true
            ],
          ]);
    ?>
  </div>
  <div class='col-md-4'>
    <?php echo DatePicker::widget([
          'model' => $model,
          'attribute' => 'work_end_date',
          'options' => ['placeholder' => 'วันที่เสร็จสิ้น'],
          'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-m-d',
            'todayHighlight'=> true,
          ]
        ]);
    ?>
  </div>
</div>
<?php
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end();
?>

</div>
