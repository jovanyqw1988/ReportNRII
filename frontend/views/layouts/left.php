<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->id ?></p>

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
                    ['label' => Yii::t('yii', 'PERSONAL CENTER'), 'options' => ['class' => 'header']],
                    ['label' => '略', 'icon' => 'fa fa-file-code-o', 'url' => ['gii']],
                    ['label' => Yii::t('yii', 'CONFIGURE'), 'options' => ['class' => 'header']],
                    ['label' => Yii::t('yii', 'SYSTEM'), 'icon' => 'fa fa-file-code-o', 'url' => ['config/system']],
                    ['label' => Yii::t('yii', 'DATABASE LINK'), 'icon' => 'fa fa-file-code-o', 'url' => ['config/database']],
                    [
                        'label' => Yii::t('yii', 'DATA TYPE'),
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::$app->params['Data_Type']['1'], 'icon' => 'fa fa-file-code-o', 'url' => ['config/type', 'id' => 1]],
                            ['label' => Yii::$app->params['Data_Type']['2'], 'icon' => 'fa fa-file-code-o', 'url' => ['config/type', 'id' => 2]],
                            ['label' => Yii::$app->params['Data_Type']['3'], 'icon' => 'fa fa-file-code-o', 'url' => ['config/type', 'id' => 3]],
                            ['label' => Yii::$app->params['Data_Type']['4'], 'icon' => 'fa fa-file-code-o', 'url' => ['config/type', 'id' => 4]],
                            ['label' => Yii::$app->params['Data_Type']['5'], 'icon' => 'fa fa-file-code-o', 'url' => ['config/type', 'id' => 5]],
                            ['label' => Yii::$app->params['Data_Type']['6'], 'icon' => 'fa fa-file-code-o', 'url' => ['config/type', 'id' => 6]],
                            ['label' => Yii::$app->params['Data_Type']['7'], 'icon' => 'fa fa-file-code-o', 'url' => ['config/type', 'id' => 7]],
                        ],
                    ],
                    ['label' => Yii::t('yii', '上报服务'), 'options' => ['class' => 'header']],
                    [
                        'label' => Yii::t('yii', '实验仪器'),
                        'icon' => 'fa fa-file-code-o',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::$app->params['Data_Type']['1'], 'icon' => 'fa fa-file-code-o', 'url' => ['report/index', 'id' => 1]],
                            ['label' => Yii::$app->params['Data_Type']['2'], 'icon' => 'fa fa-file-code-o', 'url' => ['report/index', 'id' => 2]],
                            ['label' => Yii::$app->params['Data_Type']['3'], 'icon' => 'fa fa-file-code-o', 'url' => ['report/index', 'id' => 3]],
                            ['label' => Yii::$app->params['Data_Type']['4'], 'icon' => 'fa fa-file-code-o', 'url' => ['report/index', 'id' => 4]],
                        ],
                    ],
                    ['label' => Yii::$app->params['Data_Type']['5'], 'icon' => 'fa fa-file-code-o', 'url' => ['report/index', 'id' => 5]],
                    ['label' => Yii::$app->params['Data_Type']['6'], 'icon' => 'fa fa-file-code-o', 'url' => ['report/index', 'id' => 6]],
                    ['label' => Yii::$app->params['Data_Type']['7'], 'icon' => 'fa fa-file-code-o', 'url' => ['report/index', 'id' => 7]],
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                ],
            ]
        ) ?>

    </section>

</aside>
