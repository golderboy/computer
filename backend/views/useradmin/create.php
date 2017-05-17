<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Useradmin $model
 */

$this->title = 'Create Useradmin';
$this->params['breadcrumbs'][] = ['label' => 'Useradmins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useradmin-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
