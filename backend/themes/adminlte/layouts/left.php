<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../web/images/icon.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'เมนูระบบ', 'options' => ['class' => 'header']],
                    ['label' => 'เพิ่มครุภัณฑ์', 'icon' => 'file-code-o', 'url' => ['computer/index']],
                    ['label' => 'เพิ่มแผนก', 'icon' => 'file-code-o', 'url' => ['department/index']],
                    ['label' => 'จัดการ User', 'icon' => 'file-code-o', 'url' => ['useradmin/index']],
                    ['label' => 'รับงานแจ้งซ่อม', 'icon' => 'file-code-o', 'url' => ['work/index']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                ],
            ]
        ) ?>

    </section>

</aside>
