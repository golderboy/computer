<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Department $model
 */

$this->title = 'เพิ่ม ฝ่าย';
$this->params['breadcrumbs'][] = ['label' => 'หน้าหลัก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-create">
    <div class="page-header">

    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
