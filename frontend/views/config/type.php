<?php
$this->params['breadcrumbs'][] = Yii::t('yii', Yii::$app->params['Data_Type'][$id]);
$this->beginBlock('content-header');
?>
    <h1><?= Yii::t('yii', Yii::$app->params['Data_Type'][$id]) ?>
        <small><?= Yii::t('yii', 'Set {Data_Type}', [
                'Data_Type' => Yii::t('yii', Yii::$app->params['Data_Type'][$id])
            ]) ?></small>
    </h1>
<?php $this->endBlock(); ?>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->

            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs">
                    <li class="pull-left header"><i class="fa fa-inbox"></i> <?= Yii::t('yii', 'Set {Data_Type}', [
                            'Data_Type' => Yii::t('yii', Yii::$app->params['Data_Type'][$id])
                        ]) ?></li>
                    <li class=" pull-right"><a href="#config_3"
                                               data-toggle="tab"><?= Yii::t('yii', 'Finish:Test') ?></a>
                    </li>
                    <li class=" pull-right"><a href="#config_2"
                                               data-toggle="tab"><?= Yii::t('yii', 'Second:Set Query SQL And Field Mapping') ?></a>
                    </li>
                    <li class="active pull-right"><a href="#config_1"
                                                     data-toggle="tab"><?= Yii::t('yii', 'First:Filter SQL Fields') ?></a>
                    </li>
                </ul>
                <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="config_1" style="position: relative;">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>字段名</th>
                                                <th>说明</th>
                                                <th width="80px">可查阅</th>
                                            </tr>
                                            <?php foreach (Yii::$app->params['Data_Fields'] as $field => $opt) { ?>
                                                <tr>
                                                    <td><?= $field ?></td>
                                                    <td><?= isset($opt['label']) ? $opt['label'] : $field ?></td>
                                                    <td><?= isset($opt['desc']) ? $opt['desc'] : (isset($opt['label']) ? $opt['label'] : $field) ?></td>
                                                    <td align="center"><!-- checkbox -->
                                                        <div class="form-group">
                                                            <label>
                                                                <input type="checkbox" class="flat-red"/>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div>
                        </div>
                    </div>
                    <div class="chart tab-pane" id="config_2" style="position: relative;">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-lg-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?= Yii::t('yii', 'Query SQL Template') ?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form">
                                        <div class="box-body">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label><?= Yii::t('yii', 'SQL') ?></label>
                                            <textarea class="form-control" rows="3"
                                                      placeholder="SELECT :fields FROM table WHERE type=1 :pages"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="dbname"><?= Yii::t('yii', 'SQL Field LIST') ?>
                                                    [:fields]</label>
                                                <input id="dbname" type="text" class="form-control" placeholder="*"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="dbname"><?= Yii::t('yii', 'SQL Pages') ?>[:fields]</label>
                                                <input id="dbname" type="text" class="form-control"
                                                       placeholder="LIMIT :start :limit"/>
                                            </div>

                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit"
                                                    class="btn btn-primary pull-right"><?= Yii::t('yii', 'Save') ?></button>
                                            <button type="submit"
                                                    class="btn btn-primary"><?= Yii::t('yii', 'Test') ?></button>
                                        </div>
                                        <div class="pad margin no-print">
                                            <div class="callout callout-info" style="margin-bottom: 0!important;">
                                                <h4><i class="fa fa-info"></i> Note:</h4>
                                                This page has been enhanced for printing. Click the print button at the
                                                bottom of the invoice to test.
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- left column -->
                            <div class="col-lg-6">
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?= Yii::t('yii', 'Field Mapping') ?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>字段名</th>
                                                <th width="50%">映射</th>
                                            </tr>
                                            <?php foreach (Yii::$app->params['Data_Fields'] as $field => $opt) { ?>
                                                <tr>
                                                    <td><?= isset($opt['label']) ? $opt['label'] : $field ?></td>
                                                    <td align="center"><!-- checkbox -->
                                                        <div class="form-group">
                                                            <input id="<?= $field ?>" type="text" name="<?= $field ?>"
                                                                   class="form-control" placeholder="Enter ..."/>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit"
                                                class="btn btn-primary pull-right"><?= Yii::t('yii', 'Save') ?></button>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?= Yii::t('yii', 'Test') ?></h3>
                                        <div class="box-tools">
                                            <div class="input-group  pull-left" style="width: 140px;">
                                                <span class="input-group-addon"><?= Yii::t('yii', 'SQL Start') ?></span>
                                                <input type="text" name="table_search" class="form-control input-sm"
                                                       placeholder="[:start]"/>
                                            </div>
                                            <div class="input-group  pull-left" style="width: 168px;">
                                                <span class="input-group-addon"><?= Yii::t('yii', 'SQL Limit') ?></span>
                                                <input type="text" name="table_search"
                                                       class="form-control input-sm pull-left" placeholder="[:limit]"/>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>字段名</th>
                                                <th>值</th>
                                                <th width="60px">索引</th>
                                            </tr>
                                            <?php foreach (Yii::$app->params['Data_Fields'] as $field => $opt) { ?>
                                                <tr>
                                                    <td><?= $field ?></td>
                                                    <td width="50%" align="center"><!-- checkbox -->
                                                        <div class="form-group">
                                                            <input id="<?= $field ?>" type="text" name="<?= $field ?>"
                                                                   class="form-control" value="value" disabled/>
                                                        </div>
                                                    </td>
                                                    <td align="center"><!-- checkbox -->
                                                        <div class="form-group">
                                                            <label>
                                                                <input type="checkbox" class="flat-red"/>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer clearfix">
                                    <span
                                        style="font-size: 20px"><?= Yii::t('yii', 'Result:{total} records!', ["total" => 6]) ?></span>
                                        <ul class="pagination pagination-sm no-margin pull-right">
                                            <li><a href="#">&laquo;</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">6</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>

                        </div>
                    </div>
                    <div class="chart tab-pane" id="config_3" style="position: relative;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box">
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th width="120px">字段名</th>
                                                <th>表单</th>
                                                <th width="80px">可查阅</th>
                                                <th width="60px">索引</th>
                                            </tr>
                                            <?php foreach (Yii::$app->params['Data_Fields'] as $field => $opt) { ?>
                                                <tr>
                                                    <td align="right"><?= isset($opt['label']) ? $opt['label'] : $field ?></td>
                                                    <td><?php
                                                        switch ($opt['type']) {
                                                            case 'VARCHAR':
                                                                ?>
                                                                <div class="form-group">
                                                                    <input type="text" name="<?= $field ?>"
                                                                           class="form-control"/>
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'TEXT':
                                                                ?>
                                                                <div class="form-group">
                                                                <textarea class="form-control" name="<?= $field ?>"
                                                                          rows="3" placeholder=""></textarea>
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'URL':
                                                                ?>
                                                                <div class="form-group">
                                                                    <input type="text" name="<?= $field ?>"
                                                                           class="form-control"/>
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'EMAIL':
                                                                ?>
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control"
                                                                           name="<?= $field ?>"
                                                                           placeholder="Enter email">
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'PHONE':
                                                                ?>
                                                                <div class="form-group">
                                                                    <input type="text" name="<?= $field ?>"
                                                                           class="form-control"/>
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'DATE':
                                                                ?>
                                                                <!-- Date -->
                                                                <div class="form-group">
                                                                    <div class="input-group date">
                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                        <input type="text"
                                                                               class="form-control pull-right"
                                                                               format="<?= $opt['format'] ?>"
                                                                               datepicker>
                                                                    </div>
                                                                    <!-- /.input group -->
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'FLOAT':
                                                                ?>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">￥</span>
                                                                        <input type="text" class="form-control">
                                                                <span
                                                                    class="input-group-addon">.<?php for ($i = 0; $i < $opt['decimal']; $i++) {
                                                                        echo '0';
                                                                    } ?><?= $opt['unit'] ?></span>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'SELECT':
                                                                ?>
                                                                <div class="form-group">
                                                                    <select class="form-control select2"
                                                                            style="width: 100%;">
                                                                        <?php $tmp = 0;
                                                                        foreach ($opt['values'] as $value => $label) { ?>
                                                                            <option <?= !$tmp ? "selected=\"selected\"" : "" ?>
                                                                                value="<?= isset($opt['showValue']) && $opt['showValue'] ? $value : $label ?>">
                                                                                <?= $label ?>
                                                                            </option>
                                                                            <?php $tmp++;
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                                <?php
                                                                break;
                                                        }
                                                        ?></td>
                                                    <td align="center"><!-- checkbox -->
                                                        <div class="form-group">
                                                            <label>
                                                                <input type="checkbox" class="flat-red"/>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td align="center"><!-- checkbox -->
                                                        <div class="form-group">
                                                            <label>
                                                                <input type="checkbox" class="flat-red"/>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.nav-tabs-custom -->
        </div>
    </div>
<?php
$this->registerJs('
$(document).ready(function(){ 
    $(".select2").select2();
    $("[data-mask]").inputmask();
    $("[datepicker]").each(function () {
        var format = $(this).attr("format");
        $(this).datepicker({
          autoclose: true,
          format: format
        });
    });
});
', \yii\web\View::POS_END);