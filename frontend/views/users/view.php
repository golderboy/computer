<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            ['label' => 'pname','value' => $model->prename->pname,],
            'fname',
            'lname',
            ['label' => 'sex','value' => $model->sexname->sexname,],
            'email:email',
            ['label' => 'dep_id','value' => $model->depname->dep_name,],
            //'status',
            //'created_at',
            //'updated_at',
            //'sta_id',
        ],
    ]) ?>

</div>
