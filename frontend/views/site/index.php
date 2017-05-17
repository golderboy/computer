<?php
use app\models\Work;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;



$this->title = 'ระบบโปรแกรมแจ้งซ่อมออนไลน์';
?>
<div class="site-index">
    <div class="body-content">
<?= Html::img('@web/images/logo.png',$options = ['class'=>'rounded','height'=>'250']);?>
      <div class="row">

        <div class="col-sm-3">
          <!-- small box -->
          <div class="panel panel-primary">
            <div class="panel-heading"><h3>  แจ้งซ่อม</h3> </div>
            <div class="panel-body">
              <h1><?=FA::icon('cog fa-spin fa-2x')?>
                <?= Work::find()
                              ->select(['COUNT(*) AS work'])
                              ->where('sta_id = 1')
                              ->count();
                  ?></h1>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <!-- small box -->
          <div class="panel panel-info">
            <div class="panel-heading"><h3>รับเรื่อง</h3>   </div>
            <div class="panel-body">
              <h1><?=FA::icon('check-square fa-2x')?>
                <?= Work::find()
                              ->select(['COUNT(*) AS work'])
                              ->where('sta_id = 2')
                              ->count();
                  ?></h1>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <!-- small box -->
          <div class="panel panel-primary">
            <div class="panel-heading"><h3>รออะไหล่</h3> </div>
            <div class="panel-body">
              <H1><?=FA::icon('truck fa-2x')?>
                <?= Work::find()
                              ->select(['COUNT(*) AS work'])
                              ->where('sta_id = 3')
                              ->count();
                  ?></h1>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <!-- small box -->
          <div class="panel panel-info">
            <div class="panel-heading"><h3>  ซ่อมเสร็จ</h3> </div>
            <div class="panel-body">
              <h1>
                <?=FA::icon('check fa-2x')?>
                <?= Work::find()
                              ->select(['COUNT(*) AS work'])
                              ->where('sta_id = 4')
                              ->count();
                  ?></h1>
            </div>
          </div>
        </div>

      </div>

    </div>
</div>
