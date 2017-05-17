<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Computer $model
 */

$this->title = 'Update Computer: ' . ' ' . $model->item_name;
$this->params['breadcrumbs'][] = ['label' => 'Computers', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="computer-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
