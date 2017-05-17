<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;
use app\models\Statuswork;
/**
 * @var yii\web\View $this
 * @var app\models\Work $model
 */

$this->title = $model->work_title;
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'attributes' => [
            //'work_id',
            'work_code',
            [
                'attribute' => 'work_date',
                'format' => [
                    'date', (isset(Yii::$app->modules['datecontrol']['displaySettings']['date']))
                        ? Yii::$app->modules['datecontrol']['displaySettings']['date']
                        : 'd-m-Y'
                ],
                'type' => DetailView::INPUT_WIDGET,
                'widgetOptions' => [
                    'class' => DateControl::classname(),
                    'type' => DateControl::FORMAT_DATE
                ]
            ],
            'work_title',
            //'item_id',
            ['label'=>'รายละเอียด','value'=> Html::decode($model->work_user_text)],
            //'work_user_text:ntext',
            //'user_id',
            //'dep_id',
            ['label'=>'สถานะ','value'=>$model->swork->sta_name],
            'work_user_id',
            ['label'=>'รายละเอียด','value'=> Html::decode($model->work_text)],
            [
                'attribute' => 'work_end_date',
                'format' => [
                    'date', (isset(Yii::$app->modules['datecontrol']['displaySettings']['date']))
                        ? Yii::$app->modules['datecontrol']['displaySettings']['date']
                        : 'd-m-Y'
                ],
                'type' => DetailView::INPUT_WIDGET,
                'widgetOptions' => [
                    'class' => DateControl::classname(),
                    'type' => DateControl::FORMAT_DATE
                ]
            ],
            [
                'attribute' => 'd_update',
                'format' => [
                    'datetime', (isset(Yii::$app->modules['datecontrol']['displaySettings']['date']))
                        ? Yii::$app->modules['datecontrol']['displaySettings']['date']
                        : 'd-m-Y'
                ],
                'type' => DetailView::INPUT_WIDGET,
                'widgetOptions' => [
                    'class' => DateControl::classname(),
                    'type' => DateControl::FORMAT_DATETIME
                ]
            ],
        ],
        //'deleteOptions' => [
        //    'url' => ['delete', 'id' => $model->work_id],
        //],
        //'enableEditMode' => true,
    ]) ?>

</div>
