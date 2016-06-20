<?php
$this->params['breadcrumbs'][] = Yii::t('yii', 'System Configuration');
$this->beginBlock('content-header');
?>
<h1><?= Yii::t('yii', 'System Configuration') ?>
    <small><?= Yii::t('yii', 'Set System Configuration') ?></small>
</h1>
<?php $this->endBlock(); ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Yii::t('yii', 'Set System Configuration') ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="insCode"><?= Yii::t('yii', 'insCode') ?></label>
                        <input id="insCode" type="text" class="form-control" placeholder="Enter insCode"/>
                    </div>
                    <div class="form-group">
                        <label for="client_id"><?= Yii::t('yii', 'client_id') ?></label>
                        <input id="client_id" type="text" class="form-control" placeholder="Enter client_id"/>
                    </div>
                    <div class="form-group">
                        <label for="client_secret"><?= Yii::t('yii', 'client_secret') ?></label>
                        <input id="client_secret" type="text" class="form-control" placeholder="Enter client_secret"/>
                    </div>
                    <div class="form-group">
                        <label for="redirect_uri"><?= Yii::t('yii', 'redirect_uri') ?></label>
                        <input id="redirect_uri" type="text" class="form-control" placeholder="Enter redirect_uri"/>
                    </div>
                    <div class="form-group">
                        <label for="state"><?= Yii::t('yii', 'state') ?></label>
                        <input id="state" type="text" class="form-control" placeholder="Enter state"/>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right"><?= Yii::t('yii', 'Save') ?></button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
