<?php
use yii\helpers\Url;

$this->params['breadcrumbs'][] = Yii::t('yii', 'Instrument Report');
$this->beginBlock('content-header');
?>
    <h1><?= Yii::t('yii', 'Instrument Report') ?>
        <small><?= Yii::t('yii', 'Instrument Report Center') ?></small>
    </h1>
<?php $this->endBlock(); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box  box-primary">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="100px"><?= isset(Yii::$app->params['Data_Fields']['image']['label']) ? Yii::$app->params['Data_Fields']['image']['label'] : 'image' ?></th>
                            <th><?= isset(Yii::$app->params['Data_Fields']['canme']['label']) ? Yii::$app->params['Data_Fields']['canme']['label'] : 'canme' ?></th>
                            <th width="80px"><?= Yii::t('yii', "Operation") ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        for ($i = 0; $i < 35; $i++) { ?>
                            <tr>
                                <td><img src="http://pic1a.nipic.com/20090327/906241_080913087_2.jpg" height="100px">
                                </td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>Update software</td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-danger"
                                                         style="width: 55%"></div>
                                                </div>
                                            </td>
                                            <td width="50px"><span class="badge bg-red">55%</span></td>
                                        </tr>
                                        <tr>
                                            <td>Clean database</td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-yellow"
                                                         style="width: 70%"></div>
                                                </div>
                                            </td>
                                            <td width="50px"><span class="badge bg-yellow">70%</span></td>
                                        </tr>
                                        <tr>
                                            <td>Cron job running</td>
                                            <td>
                                                <div class="progress progress-xs progress-striped active">
                                                    <div class="progress-bar progress-bar-primary"
                                                         style="width: 30%"></div>
                                                </div>
                                            </td>
                                            <td width="50px"><span class="badge bg-light-blue">30%</span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="center"><!-- checkbox -->
                                    <a class="btn btn-app"
                                       href="<?= Url::to(['report/show', 'innerId' => 'xdsa23232']) ?>">
                                        <i class="fa fa-eye"></i> <?= Yii::t('yii', "Show") ?>
                                    </a>
                                    <a class="btn btn-app">
                                        <i class="fa fa-cloud-upload"></i> <?= Yii::t('yii', "Report") ?>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        <tfoot>
                        <tr>
                            <th><?= isset(Yii::$app->params['Data_Fields']['innerId']['label']) ? Yii::$app->params['Data_Fields']['innerId']['label'] : 'innerId' ?></th>
                            <th><?= isset(Yii::$app->params['Data_Fields']['canme']['label']) ? Yii::$app->params['Data_Fields']['canme']['label'] : 'canme' ?></th>
                            <th><?= Yii::t('yii', "Operation") ?></th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
<?php
$this->registerJs('
$(document).ready(function(){ 
    $("table").DataTable();  
});
', \yii\web\View::POS_END);
?>