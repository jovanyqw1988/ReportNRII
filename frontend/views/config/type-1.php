<?php
use yii\bootstrap\ActiveForm;use yii\helpers\Html;use yii\helpers\Url;

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
                    <li class=" pull-right"><a href="<?= Url::toRoute(['config/type', 'id' => $id, 'step' => 3]) ?>"
                        ><?= Yii::t('yii', 'Finish:Test') ?></a>
                    </li>
                    <li class=" pull-right">
                        <a href="<?= Url::toRoute(['config/type', 'id' => $id, 'step' => 2]) ?>">
                            <?= Yii::t('yii', 'Second:Set Query SQL And Field Mapping') ?>
                        </a>
                    </li>
                    <li class="active pull-right"><a
                            href="#config_1"><?= Yii::t('yii', 'First:Filter SQL Fields') ?></a>
                    </li>
                </ul>
                <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="config_1" style="position: relative;">
                        <div class="row">
                            <div class="col-xs-12">
                                <?php $form = ActiveForm::begin([
                                    'id' => 'field-filter-form',
                                    'enableClientValidation' => true,
                                    'layout' => 'horizontal',
                                    'fieldConfig' => [
                                        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                                        'horizontalCssClasses' => [
                                            'label' => '',
                                            'offset' => '',
                                            'wrapper' => '',
                                            'error' => '',
                                            'hint' => '',
                                        ],
                                    ]
                                ]); ?>
                                <div class="box">
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>字段名</th>
                                                <th>说明</th>
                                                <th width="80px">可查阅</th>
                                            </tr>

                                            <?php foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
                                                if (!in_array($id, $opt['support'])) {
                                                    continue;
                                                }
                                                ?>
                                                <tr>
                                                    <td><?= $field ?></td>
                                                    <td><?= isset($opt['label']) ? $opt['label'] : $field ?></td>
                                                    <td><?= isset($opt['desc']) ? $opt['desc'] : (isset($opt['label']) ? $opt['label'] : $field) ?></td>
                                                    <td align="center"><!-- checkbox -->
                                                        <?= $form->field($model, $field)
                                                            ->checkbox(['disabled' => isset($opt['required']) && $opt['required']])->label(false) ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-primary pull-right']) ?>
                                    </div>
                                </div><!-- /.box -->
                                <?php ActiveForm::end(); ?>
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