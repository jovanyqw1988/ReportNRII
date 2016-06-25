<?php
use yii\bootstrap\ActiveForm;use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', '平台用户'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title = Yii::t('yii', '创建平台用户');
$this->beginBlock('content-header');
?>
<h1><?= Yii::t('yii', '平台用户') ?>
    <small><?= $this->title ?></small>
</h1>
<?php $this->endBlock(); ?>
<div class="row">
    <!-- /.col -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Yii::t('yii', '创建平台用户') ?></h3>
            </div>
            <!-- /.box-header -->

            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-2',
                        'offset' => '',
                        'wrapper' => 'col-sm-10',
                        'error' => '',
                        'hint' => '',
                    ],
                ]
            ]); ?>
            <div class="box-body">
                <?= $form
                    ->field($model, 'pf_name', [
                        'options' => ['class' => 'form-group has-feedback'],
                        'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
                    ])
                    ->textInput([])

                ?>
                <?= $form
                    ->field($model, 'account', [
                        'options' => ['class' => 'form-group has-feedback'],
                        'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
                    ])
                    ->textInput([])

                ?>

                <?= $form
                    ->field($model, 'password', [
                        'options' => ['class' => 'form-group has-feedback'],
                        'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
                    ])
                    ->passwordInput()
                ?>

                <?= $form
                    ->field($model, 'pf_desc', [
                        'options' => ['class' => 'form-group has-feedback'],
                        'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
                    ])
                    ->textarea([])
                ?>

            </div>

            <div class="box-footer">
                <?= Html::submitButton('创建', ['class' => 'btn btn-primary btn-block btn-flat pull-right', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <!-- /.box -->
</div>