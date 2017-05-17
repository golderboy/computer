<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Useradmin $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Useradmins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useradmin-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'pname',
            'fname',
            'lname',
            'sex',
            'email:email',
            'dep_id',
            'status',
            'created_at',
            'updated_at',
            'sta_id',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
