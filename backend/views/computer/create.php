<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Computer $model
 */

$this->title = 'เพิ่ม Computer';
$this->params['breadcrumbs'][] = ['label' => 'Computers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computer-create">
    <div class="page-header">
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
