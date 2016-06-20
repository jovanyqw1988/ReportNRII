<?php
$this->params['breadcrumbs'][] = Yii::t('yii', 'Database Link');
$this->beginBlock('content-header');
?>
    <h1><?= Yii::t('yii', 'Database Link') ?>
        <small><?= Yii::t('yii', 'Set Database Link') ?></small>
    </h1>
<?php $this->endBlock(); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Yii::t('yii', 'Set Database Link') ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="type"><?= Yii::t('yii', 'Database Type') ?></label>
                            <select id="type" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="mysql">MySQL</option>
                            </select>
                        </div>
                        <!-- IP mask -->
                        <div class="form-group">
                            <label for="host"><?= Yii::t('yii', 'Host') ?></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-laptop"></i>
                                </div>
                                <input id="host" type="text" class="form-control" data-inputmask="'alias': 'ip'"
                                       data-mask>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label for="dbname"><?= Yii::t('yii', 'Database Name') ?></label>
                            <input id="dbname" type="text" class="form-control" placeholder="Enter ..."/>
                        </div>
                        <div class="form-group">
                            <label for="user"><?= Yii::t('yii', 'User') ?></label>
                            <input id="user" type="text" class="form-control" placeholder="Enter ..."/>
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label for="password"><?= Yii::t('yii', 'Password') ?></label>
                            <input type="password" class="form-control" id="password" placeholder="Enter ...">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right"><?= Yii::t('yii', 'Save') ?></button>
                        <button type="submit" class="btn btn-primary"><?= Yii::t('yii', 'Test') ?></button>
                    </div>
                </form>
            </div>
            <!-- /.box -->

            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Yii::t('yii', 'Test Result') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?= Yii::t('yii', 'Test OK!') ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>
<?php
$this->registerJs('
$(document).ready(function(){ 
    $(".select2").select2();
    $("[data-mask]").inputmask();    
});
', \yii\web\View::POS_END);