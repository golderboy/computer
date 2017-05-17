<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Work $model
 */

$this->title = 'แก้ไขใบแจ้งซ่อม : ' . ' ' . $model->work_title;
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->work_id, 'url' => ['view', 'id' => $model->work_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="work-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
