<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\WorkSearch $searchModel
 */

$this->title = 'Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Work', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'work_id',
            'work_code',
            ['attribute' => 'work_date','format' => ['date',(isset(Yii::$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::$app->modules['datecontrol']['displaySettings']['date'] : 'd-m-Y']],
            'work_title',

//            'work_user_text:ntext',
//            'user_id',
//            'dep_id',
            ['attribute' => 'sta_id',
               'value'=>function($model, $key, $index, $column){return  $model->swork->sta_name;},
                             'format'=>'raw','hAlign'=>'middle','vAlign'=>'middle',
             ],
            /*['attribute' => 'work_user_id',
                'value'=>function($model, $key, $index, $column){return  $model->adminfname->fullname;},
                              'format'=>'raw','hAlign'=>'middle','vAlign'=>'middle',
            ],
            */
//            'work_text:ntext',
            ['attribute' => 'work_end_date','format' => ['date',(isset(Yii::$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::$app->modules['datecontrol']['displaySettings']['date'] : 'd-m-Y']],
            ['attribute' => 'd_update','format' => ['date',(isset(Yii::$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::$app->modules['datecontrol']['displaySettings']['date'] : 'd-m-Y']],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',////
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['work/update', 'id' => $model->work_id, 'edit' => 't']),
                            ['title' => Yii::t('yii', 'Edit'),]
                        );
                    }
                ],
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'info',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> บันทึกในแจ้งซ่อมใหม่', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset From', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
