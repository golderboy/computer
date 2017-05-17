<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Department $model
 */

$this->title = 'แก้ไข ฝ่าย: ' . ' ' . $model->dep_name;
$this->params['breadcrumbs'][] = ['label' => 'หน้าหลัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="department-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
