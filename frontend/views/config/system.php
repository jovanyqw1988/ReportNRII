<?php
use yii\bootstrap\ActiveForm;use yii\helpers\Html;


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
                <h3 class="box-title"><?= Yii::t('yii', 'Set System Configuration') ?></h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <?= $form
                    ->field($model, 'insCode')
                    ->textInput([])
                ?>
                <?= $form
                    ->field($model, 'client_id')
                    ->textInput([])
                ?>
                <?= $form
                    ->field($model, 'client_secret')
                    ->textInput([])
                ?>
                <?= $form
                    ->field($model, 'redirect_uri')
                    ->textInput([])
                ?>
                <?= $form
                    ->field($model, 'state')
                    ->textInput([])
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
    </div>
</div>
