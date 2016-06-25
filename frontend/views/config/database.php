<?php
use yii\bootstrap\ActiveForm;use yii\helpers\Html;

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
            <!-- form start -->
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
                    <h3 class="box-title"><?= Yii::t('yii', 'Set Database Link') ?></h3>
                </div>
                <!-- /.box-header -->


                <div class="box-body">
                    <?= $form
                        ->field($model, 'type')
                        ->dropDownList(['MySQL' => 'MySQL'])
                    ?>
                    <?= $form
                        ->field($model, 'host')
                        ->textInput([])
                    ?>
                    <?= $form
                        ->field($model, 'port')
                        ->textInput([])
                    ?>
                    <?= $form
                        ->field($model, 'name')
                        ->textInput([])
                    ?>
                    <?= $form
                        ->field($model, 'charset')
                        ->textInput([])
                    ?>
                    <?= $form
                        ->field($model, 'user')
                        ->textInput([])
                    ?>
                    <?= $form
                        ->field($model, 'password')
                        ->passwordInput([])
                    ?>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-primary pull-right', 'name' => 'submit', 'value' => 'save']) ?>
                    <?= Html::submitButton(Yii::t('yii', 'Test'), ['class' => 'btn btn-primary', 'name' => 'submit', 'value' => 'test']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
            <!-- /.box -->

            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Yii::t('yii', 'Test Result') ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?= $result ?>
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