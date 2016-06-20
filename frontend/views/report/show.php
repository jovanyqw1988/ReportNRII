<?php
use yii\helpers\Url;

$this->params['breadcrumbs'][] = Yii::t('yii', 'Instrument Report');
$this->beginBlock('content-header');
?>
<h1><?= Yii::t('yii', 'Instrument Report') ?>
    <small><?= Yii::t('yii', 'Instrument Report Information') ?></small>
</h1>
<?php $this->endBlock(); ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $id ?></h3>
                <a class="pull-right" href="<?= Url::to(['report/index']) ?>"><i
                        class="fa fa-cloud-print"><?= Yii::t('yii', "Back") ?></i>
                </a>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>字段名</th>
                        <th>说明</th>
                    </tr>
                    <?php foreach (Yii::$app->params['Data_Fields'] as $field => $opt) { ?>
                        <tr>
                            <td><?= $field ?></td>
                            <td><?= isset($opt['label']) ? $opt['label'] : $field ?></td>
                            <td><?= isset($opt['desc']) ? $opt['desc'] : (isset($opt['label']) ? $opt['label'] : $field) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div><!-- /.box-body -->
            <!-- /.box-body -->
            <div class="box-footer">
                <a class="btn btn-app  ">
                    <i class="fa fa-cloud-print"></i> <?= Yii::t('yii', "Print") ?>
                </a><a class="btn btn-app pull-right">
                    <i class="fa fa-cloud-upload"></i> <?= Yii::t('yii', "Report") ?>
                </a>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>