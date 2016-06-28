<?php
use yii\helpers\Url;

$this->params['breadcrumbs'][] = Yii::t('yii', '平台用户');
$this->beginBlock('content-header');
?>
<h1><?= Yii::t('yii', '平台用户') ?></h1>
<?php $this->endBlock(); ?>
<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    <a class="btn btn-xs btn-social btn-dropbox" href="<?=Url::toRoute(['account/create']) ?>">
                        <i class="fa fa-plus"></i> <?= Yii::t('yii', '创建平台用户') ?>
                    </a>

                </h3>

                <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table">
                    <tr>
                        <th width="100px">ID</th>
                        <th width="30%">平台名称</th>
                        <th>上报进度</th>
                        <th style="width: 40px"></th>
                        <th style="width: 40px">查看</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-red">55%</span></td>
                        <td><span class="badge bg-red">55%</span></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Clean database</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-red">55%</span></td>
                        <td><span class="badge bg-red">55%</span></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Cron job running</td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-red">55%</span></td>
                        <td><span class="badge bg-red">55%</span></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Fix and squish bugs</td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-green">90%</span></td>
                        <td><span class="badge bg-green">90%</span></td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>