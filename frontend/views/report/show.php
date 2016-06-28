<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

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

            <div class="row">
                <div class="pad margin no-print">
                    <div class="callout callout-info" style="margin-bottom: 0!important;">
                        <h4><i class="fa fa-info"></i>
                            Notice:<?= empty($result) ? null : (isset($result['result']) ? $result['result'] : null) ?>
                        </h4>
                        <?= $message ?>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-hover">
                                <tr>
                                    <th width="30%">字段名</th>
                                    <th>值</th>
                                    <th width="80px">审核</th>
                                </tr>
                                <?php
                                function tmp_foreach($field, $result)
                                {
                                    ?>
                                    <tr>
                                        <td align="right"><?= isset($opt['label']) ? $opt['label'] : $field ?></td>
                                        <td><?= empty($result) ? '' : (isset($result[$field]) ? $result[$field] : '') ?></td>
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
                                        tmp_foreach($field, $result);
                                    }
                                } else if (in_array($id, ['5'])) {
                                    foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                                        tmp_foreach($field, $result);
                                    }
                                } else if (in_array($id, ['6'])) {
                                    foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                                        tmp_foreach($field, $result);
                                    }
                                } else if (in_array($id, ['7'])) {
                                    foreach (Yii::$app->params['Service_Effect'] as $field => $opt) {
                                        tmp_foreach($field, $result);
                                    }
                                } ?>
                            </table>
                        </div><!-- /.box-body -->
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                <?php $form = ActiveForm::begin(['action' => ['report/test']]); ?>
                                <?= Html::submitButton("测试", ['class' => 'btn btn-sm btn-default', 'name' => 'submit', 'value' => 'save']) ?>
                                <?php ActiveForm::end(); ?>
                            </div>
                            <div class="pull-right">
                                <?php $form = ActiveForm::begin(['action' => ['report/report', 'id' => $id]]); ?>
                                <?php
                                function tmp_foreach_submit($field, $result)
                                {
                                    ?>
                                    <input type="hidden" name="<?= $field ?>"
                                           value="<?= empty($result) ? null : (isset($result[$field]) ? $result[$field] : null) ?>">
                                    <?php
                                }

                                if (in_array($id, ['1', '2', '3', '4'])) {
                                    foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
                                        if (!in_array($id, $opt['support'])) {
                                            continue;
                                        }
                                        tmp_foreach_submit($field, $result);
                                    }
                                } else if (in_array($id, ['5'])) {
                                    foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                                        tmp_foreach_submit($field, $result);
                                    }
                                } else if (in_array($id, ['6'])) {
                                    foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                                        tmp_foreach_submit($field, $result);
                                    }
                                } else if (in_array($id, ['7'])) {
                                    foreach (Yii::$app->params['Service_Effect'] as $field => $opt) {
                                        tmp_foreach_submit($field, $result);
                                    }
                                }
                                ?>
                                <?= Html::submitButton(Yii::t('yii', '上报'), ['class' => 'btn btn-sm btn-default', 'name' => 'submit', 'value' => 'save']) ?>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div>
            </div>

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