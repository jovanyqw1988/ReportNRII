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
                    <li class="active pull-right"><a href="#config_2"
                        ><?= Yii::t('yii', 'Second:Set Query SQL And Field Mapping') ?></a>
                    </li>
                    <li class="pull-right"><a href="<?= Url::toRoute(['config/type', 'id' => $id, 'step' => 1]) ?>"
                        ><?= Yii::t('yii', 'First:Filter SQL Fields') ?></a>
                    </li>
                </ul>
                <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="active chart tab-pane" id="config_2" style="position: relative;">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-lg-12">
                                <?php $form = ActiveForm::begin([
                                    'id' => 'login-form',
                                    'enableClientValidation' => true,
                                    'layout' => 'horizontal',
                                    'fieldConfig' => [
                                        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                                        'horizontalCssClasses' => [
                                            'label' => 'col-sm-3',
                                            'offset' => '',
                                            'wrapper' => 'col-sm-9',
                                            'error' => '',
                                            'hint' => '',
                                        ],
                                    ]
                                ]); ?>
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?= Yii::t('yii', 'Query SQL Template') ?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form">
                                        <div class="box-body">
                                            <?= $form
                                                ->field($model, 'sql')
                                                ->textarea(['placeholder' => 'SELECT :fields FROM table WHERE type=1 :pages'])
                                                ->label(Yii::t('yii', 'SQL'));
                                            ?>
                                            <?= $form
                                                ->field($model, 'sql_fields')
                                                ->textarea(['placeholder' => '*'])
                                                ->label(Yii::t('yii', 'SQL Field LIST') . '[:fields]');
                                            ?>
                                            <?= $form
                                                ->field($model, 'sql_pages')
                                                ->textInput(['placeholder' => 'LIMIT :start :limit'])
                                                ->label(Yii::t('yii', 'SQL Pages') . '[:pages]')
                                            ?>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-primary pull-right', 'name' => 'submit', 'value' => 'save']) ?>
                                            <?= Html::submitButton(Yii::t('yii', 'Test'), ['class' => 'btn btn-primary', 'name' => 'submit', 'value' => 'test']) ?>
                                        </div>
                                        <div class="pad margin no-print">
                                            <div class="callout callout-info" style="margin-bottom: 0!important;">
                                                <h4><i class="fa fa-info"></i> SQL:</h4>
                                                <?php if ($result && $result['sql']) foreach ($result['sql'] as $sql) {
                                                    echo $sql . "<br>";
                                                } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                                <?php ActiveForm::end(); ?>
                            </div>
                            <!-- left column -->
                            <div class="col-lg-6">
                                <?php $form = ActiveForm::begin([
                                    'id' => 'field-filter-form',
                                    'enableClientValidation' => true,
                                    'layout' => 'horizontal',
                                    'fieldConfig' => [
                                        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                                        'horizontalCssClasses' => [
                                            'label' => '',
                                            'offset' => '',
                                            'wrapper' => 'col-sm-11',
                                            'error' => '',
                                            'hint' => '',
                                        ],
                                    ]
                                ]); ?>
                                <!-- Horizontal Form -->
                                <div class="box box-info col-sm-11">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?= Yii::t('yii', 'Field Mapping') ?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>字段名</th>
                                                <th width="60%">映射</th>
                                            </tr>
                                            <?php foreach ($fields as $field) { ?>
                                                <tr>
                                                    <td><?= isset($opt['label']) ? $opt['label'] : $field ?></td>
                                                    <td><!-- checkbox -->
                                                        <?= $form->field($instrument, $field)->textInput([])->label(false) ?>
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
                                <?php ActiveForm::end(); ?>
                            </div>
                            <div class="col-lg-6">
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?= Yii::t('yii', 'Test') ?></h3>
                                        <div class="box-tools">
                                            <?php $form = ActiveForm::begin([
                                                'id' => 'field-filter-form',
                                                'enableClientValidation' => true,
                                                'layout' => 'horizontal',
                                                'fieldConfig' => [
                                                    'template' => '{label}{beginWrapper}{input}{hint}{error}{endWrapper}',
                                                    'horizontalCssClasses' => [
                                                        'label' => 'col-sm-7',
                                                        'offset' => '',
                                                        'wrapper' => 'col-sm-5',
                                                        'error' => '',
                                                        'hint' => '',
                                                    ],
                                                ]
                                            ]); ?>
                                            <div class="input-group  pull-left" style="width: 180px;">
                                                <?= $form->field($query, 'start', [])->textInput(['class' => 'form-control input-sm', 'placeholder' => '[:start]'])->label(Yii::t('yii', 'SQL Start')) ?>
                                            </div>
                                            <div class="input-group  pull-left" style="width: 180px;">
                                                <?= $form->field($query, 'limit', [])->textInput(['class' => 'form-control input-sm', 'placeholder' => '[:limit]'])->label(Yii::t('yii', 'SQL Limit')) ?>
                                            </div>
                                            <div class="input-group  pull-left"
                                            <div class="input-group-btn">
                                                <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-sm btn-default', 'name' => 'submit', 'value' => 'save']) ?>
                                            </div>
                                        </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover ">
                                        <tr>
                                            <th>字段名</th>
                                            <th>值</th>
                                            <th width="60px">索引</th>
                                        </tr>
                                        <?php if ($result && $result['data']) foreach ($result['data'] as $field => $value) { ?>
                                            <tr>
                                                <td><?= $field ?></td>
                                                <td width="50%" align="center"><!-- checkbox -->
                                                    <div class="form-group">
                                                        <input id="<?= $field ?>" type="text" name="<?= $field ?>"
                                                               class="form-control  col-sm-11" value="<?= $value ?>"
                                                               disabled/>
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
                                    <?php
                                    if ($result) {
                                        $total = $result['total'];
                                        $count = 6;
                                        $indexes = [];
                                        $index = $result['index'];
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
                                            <?= $form->field($query, 'start', [])->hiddenInput([''])->label(false) ?>
                                            <?= $form->field($query, 'limit', [])->hiddenInput([''])->label(false) ?>
                                            <?= Html::submitButton("&raquo;", ['class' => 'btn btn-sm btn-default', 'name' => 'submit', 'value' => 'save']) ?>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                        <?php foreach ($indexes as $tmp) { ?>
                                            <div class="pull-right">
                                                <?php $form = ActiveForm::begin(['action' => ['config/type', 'id' => $id, 'step' => $step, 'index' => $tmp]]); ?>
                                                <?= $form->field($query, 'start', [])->hiddenInput([''])->label(false) ?>
                                                <?= $form->field($query, 'limit', [])->hiddenInput([''])->label(false) ?>
                                                <?= Html::submitButton($tmp + 1, ['class' => 'btn btn-sm btn-' . ($index == $tmp ? "primary" : "default"), 'name' => 'submit', 'value' => 'save']) ?>
                                                <?php ActiveForm::end(); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="pull-right">
                                            <?php $form = ActiveForm::begin(['action' => ['config/type', 'id' => $id, 'step' => $step, 'index' => 0]]); ?>
                                            <?= $form->field($query, 'start', [])->hiddenInput([''])->label(false) ?>
                                            <?= $form->field($query, 'limit', [])->hiddenInput([''])->label(false) ?>
                                            <?= Html::submitButton('&laquo;', ['class' => 'btn btn-sm btn-default', 'name' => 'submit', 'value' => 'save']) ?>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                        <div class="pull-left">
                                            <?php $form = ActiveForm::begin(['action' => ['config/type', 'id' => $id, 'step' => $step, 'index' => $index]]); ?>
                                            <?= $form->field($query, 'start', [])->hiddenInput([''])->label(false) ?>
                                            <?= $form->field($query, 'limit', [])->hiddenInput([''])->label(false) ?>
                                            <?= Html::submitButton(Yii::t('yii', 'Result:{total} records!', ["total" => $result['total']]), ['class' => 'btn btn-sm btn-default', 'name' => 'submit', 'value' => 'save']) ?>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.box -->
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