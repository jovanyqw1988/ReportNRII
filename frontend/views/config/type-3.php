<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

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
                    <li class="active pull-right"><a href="#config_3"
                        ><?= Yii::t('yii', 'Finish:Test') ?></a>
                    </li>
                    <li class=" pull-right"><a href="<?= Url::toRoute(['config/type', 'id' => $id, 'step' => 2]) ?>"
                        ><?= Yii::t('yii', 'Second:Set Query SQL And Field Mapping') ?></a>
                    </li>
                    <li class=" pull-right"><a href="<?= Url::toRoute(['config/type', 'id' => $id, 'step' => 1]) ?>"
                        ><?= Yii::t('yii', 'First:Filter SQL Fields') ?></a>
                    </li>
                </ul>
                <div class="tab-content no-padding">
                    <div class="active chart tab-pane" id="config_3" style="position: relative;">
                        <div class="row">
                            <div class="pad margin no-print">
                                <div class="callout callout-info" style="margin-bottom: 0!important;">
                                    <h4><i class="fa fa-info"></i> Notice:</h4>
                                    <?= $message ?>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <table class="table table-hover">
                                            <tr>
                                                <th width="120px">字段名</th>
                                                <th>表单</th>
                                                <th width="80px">可查阅</th>
                                                <th width="60px">索引</th>
                                            </tr>
                                            <?php
                                            function tmp_foreach($opt, $field, $result)
                                            {
                                                ?>
                                                <tr>
                                                    <td align="right"><?= isset($opt['label']) ? $opt['label'] : $field ?></td>
                                                    <td><?php
                                                        switch ($opt['type']) {
                                                            case 'VARCHAR':
                                                                ?>
                                                                <div class="form-group">
                                                                    <input type="text" name='<?= $field ?>'
                                                                           class="form-control"
                                                                           value="<?= empty($result) ? '' : (isset($result[$field]) ? $result[$field] : '') ?>">
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'TEXT':
                                                                ?>
                                                                <div class="form-group">
                                                                <textarea class="form-control" name="<?= $field ?>"
                                                                          rows="3" placeholder=""
                                                                          value="<?= empty($result) ? '' : (isset($result[$field]) ? $result[$field] : '') ?>"></textarea>
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'URL':
                                                                ?>
                                                                <div class="form-group">
                                                                    <input type="text" name="<?= $field ?>"
                                                                           class="form-control"
                                                                           value="<?= empty($result) ? '' : (isset($result[$field]) ? $result[$field] : '') ?>"/>
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'EMAIL':
                                                                ?>
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control"
                                                                           name="<?= $field ?>"
                                                                           placeholder="Enter email"
                                                                           value="<?= empty($result) ? '' : (isset($result[$field]) ? $result[$field] : '') ?>">
                                                                </div>
                                                                <?php
                                                                break;
                                                            case 'PHONE':
                                                                ?>
                                                                <div class="form-group">
                                                                    <input type="text" name="<?= $field ?>"
                                                                           class="form-control"
                                                                           value="<?= empty($result) ? '' : (isset($result[$field]) ? $result[$field] : '') ?>"/>
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
                                                                               datepicker
                                                                               value="<?= empty($result) ? '' : (isset($result[$field]) ? $result[$field] : '') ?>">
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
                                                                        <input type="text" class="form-control"
                                                                               value="<?= empty($result) ? '' : (isset($result[$field]) ? $result[$field] : '') ?>">
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
                                                                        <?php
                                                                        foreach ($opt['values'] as $value => $label) { ?>
                                                                            <option <?= (empty($result) ? '' : (isset($result[$field]) ? $result[$field] : '')) == (isset($opt['showValue']) && $opt['showValue'] ? $value : $label) ? "selected=\"selected\"" : "" ?>
                                                                                value="<?= isset($opt['showValue']) && $opt['showValue'] ? $value : $label ?>">
                                                                                <?= $label ?>
                                                                            </option>
                                                                            <?php
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
                                                <?php
                                            }

                                            if (in_array($id, ['1', '2', '3', '4'])) {
                                                foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
                                                    if (!in_array($id, $opt['support'])) {
                                                        continue;
                                                    }
                                                    tmp_foreach($opt, $field, $result);
                                                }
                                            } else if (in_array($id, ['5'])) {
                                                foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                                                    tmp_foreach($opt, $field, $result);
                                                }
                                            } else if (in_array($id, ['6'])) {
                                                foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                                                    tmp_foreach($opt, $field, $result);
                                                }
                                            } else if (in_array($id, ['7'])) {
                                                foreach (Yii::$app->params['Service_Effect'] as $field => $opt) {
                                                    tmp_foreach($opt, $field, $result);
                                                }
                                            } ?>
                                        </table>
                                    </div><!-- /.box-body -->
                                    <!-- /.box-body -->
                                    <div class="box-footer clearfix">
                                        <?php
                                        if ($remote) {
                                            $total = $remote['total'];
                                            $count = 6;
                                            $indexes = [];
                                            $index = $remote['index'];
                                            if ($index < 0) $index = 0;
                                            if ($index >= $total) $index = $total - 1;
                                            array_push($indexes, $index);
                                            $left = $index - 1;
                                            $right = $index + 1;
                                            for ($i = 0; $left >= 0 && $i < $count / 2 && count($indexes) <= $count; $left--, $i++) {
                                                array_push($indexes, $left);
                                            }
                                            for ($i = 0; $right <= $total - 1 && $i < $count / 2 && count($indexes) <= $count; $right++, $i++) {
                                                array_push($indexes, $right);
                                            }
                                            rsort($indexes);
                                            ?>

                                            <div class="pull-right">
                                                <?php $form = ActiveForm::begin(['action' => ['config/type', 'id' => $id, 'step' => $step, 'index' => $total - 1]]); ?>
                                                <?= Html::submitButton("&raquo;", ['class' => 'btn btn-sm btn-default', 'name' => 'submit', 'value' => 'save']) ?>
                                                <?php ActiveForm::end(); ?>
                                            </div>
                                            <?php foreach ($indexes as $tmp) { ?>
                                                <div class="pull-right">
                                                    <?php $form = ActiveForm::begin(['action' => ['config/type', 'id' => $id, 'step' => $step, 'index' => $tmp]]); ?>
                                                    <?= Html::submitButton($tmp + 1, ['class' => 'btn btn-sm btn-' . ($index == $tmp ? "primary" : "default"), 'name' => 'submit', 'value' => 'save']) ?>
                                                    <?php ActiveForm::end(); ?>
                                                </div>
                                            <?php } ?>
                                            <div class="pull-right">
                                                <?php $form = ActiveForm::begin(['action' => ['config/type', 'id' => $id, 'step' => $step, 'index' => 0]]); ?>
                                                <?= Html::submitButton('&laquo;', ['class' => 'btn btn-sm btn-default', 'name' => 'submit', 'value' => 'save']) ?>
                                                <?php ActiveForm::end(); ?>
                                            </div>
                                            <div class="pull-left">
                                                <?php $form = ActiveForm::begin(['action' => ['config/type', 'id' => $id, 'step' => $step, 'index' => $index]]); ?>
                                                <?= Html::submitButton(Yii::t('yii', 'Result:{total} records!', ["total" => $remote['total']]), ['class' => 'btn btn-sm btn-default', 'name' => 'submit', 'value' => 'save']) ?>
                                                <?php ActiveForm::end(); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
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