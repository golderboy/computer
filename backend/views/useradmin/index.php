<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\UseradminSearch $searchModel
 */

$this->title = 'จัดการ User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useradmin-index">
    <div class="page-header">
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Useradmin', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

        <?php
        $gridColumns = [
                          [
                              //'class' => 'kartik\grid\Module',
                              'class'=>'kartik\grid\SerialColumn',
                              'contentOptions'=>['class'=>'kartik-sheet-style'],
                              'header'=>'',
                              'headerOptions'=>['class'=>'kartik-sheet-style']
                          ],
						  [
                              'class' => 'kartik\grid\DataColumn',
                              'attribute' => 'username',
                              //'label' => 'dep_name',
                              'value'=>function($model, $key, $index, $column){
                                                      return  $model->username;
                                                  },
                                               'format'=>'raw',
                              'hAlign'=>'middle',
                              'vAlign'=>'middle',
                          ],
						  [
                              'class' => 'kartik\grid\DataColumn',
                              'attribute' => 'email',
                              //'label' => 'dep_name',
                              'value'=>function($model, $key, $index, $column){
                                                      return  $model->email;
                                                  },
                                               'format'=>'raw',
                              'hAlign'=>'middle',
                              'vAlign'=>'middle',
                          ],
						  [
                              'class' => 'kartik\grid\DataColumn',
                              'attribute' => 'fname',
                              //'label' => 'dep_name',
                              'value'=>function($model, $key, $index, $column){
                                                      return  $model->fullname;
                                                  },
                                               'format'=>'raw',
                              'hAlign'=>'middle',
                              'vAlign'=>'middle',
                          ],
						  [
                              'class' => 'kartik\grid\DataColumn',
                              'attribute' => 'dep_id',
                              //'label' => 'dep_name',
                              'value'=>function($model, $key, $index, $column){
                                                      return  $model->depname->dep_name;
                                                  },
                                               'format'=>'raw',
                              'hAlign'=>'middle',
                              'vAlign'=>'middle',
                          ],
							[
                            'class' => '\kartik\grid\ActionColumn',
							'template' => ' {update} {delete}',
                            'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>']
                          ],
                        ];
                        ?>

          <?=  GridView::widget([
                          'id' => 'kv-grid-demo',
                          'dataProvider'=> $dataProvider,
                          'filterModel' => $searchModel,
                          'columns' => $gridColumns,
                            'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
                             'headerRowOptions'=>['class'=>'kartik-sheet-style'],
                             'filterRowOptions'=>['class'=>'kartik-sheet-style'],
                             'pjax'=>true, // pjax is set to always true for this demo
                             // set your toolbar
                             'toolbar'=> [
                                 '{export}',
                                 '{toggleData}',
                             ],
                              // set export properties
                             'export'=>[
                                    'fontAwesome'=>true
                                ],
                            'bordered'=>true,
                            'striped'=>true,
                            'condensed'=>true,
                            'responsive'=>true,
                            'hover'=>true,
                              'showPageSummary'=>true,
                            'panel'=>[
                                    'type'=>GridView::TYPE_PRIMARY,
                                    'heading'=>'รายการ',
                                ],
                            'persistResize'=>false,
                            'exportConfig'=>true,
                          ]);
            ?>

</div>
