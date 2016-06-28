<?php
use yii\bootstrap\ActiveForm;use yii\helpers\Html;use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('yii', 'Sign In');

?>

    <div class="login-box">
        <div class="login-logo">
            <a href="<?= Url::toRoute(['site/login']) ?>"><b>Report</b> NRII</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'enableClientValidation' => true,
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => '',
                        'offset' => '',
                        'wrapper' => 'col-sm-12',
                        'error' => '',
                        'hint' => '',
                    ],
                ]
            ]);
            ?>

            <?= $form
                ->field($model, 'username', ['options' => ['class' => 'form-group has-feedback'], 'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"])
                ->textInput(['placeholder' => $model->getAttributeLabel('username')])
                ->label(false)
            ?>

            <?= $form
                ->field($model, 'password', ['options' => ['class' => 'form-group has-feedback'], 'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"])
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
                ->label(false)
            ?>

            <div class="row">
                <div class="col-xs-7">
                    <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'minimal'])->label("记得我") ?>
                </div>
                <!-- /.col -->
                <div class="col-xs-5">
                    <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button', 'value' => 'login']) ?>
                </div>
                <!-- /.col -->
            </div>


            <?php ActiveForm::end(); ?>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="<?= Url::toRoute(['site/authorization']) ?>"
                   class="btn btn-block btn-social btn-facebook btn-flat"><i
                        class="fa fa-facebook"></i><?= Yii::t('yii', "Large Instrument Platform") ?></a>
            </div>
            <!-- /.social-auth-links -->

            <a href="#">I forgot my password</a><br>
            <a href="<?= Url::toRoute(['site/signup']) ?>" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
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
        //iCheck for checkbox and radio inputs
    $(\'input[type="checkbox"].minimal, input[type="radio"].minimal\').iCheck({
      checkboxClass: \'icheckbox_minimal-blue\',
      radioClass: \'iradio_minimal-blue\'
    });
    //Red color scheme for iCheck
    $(\'input[type="checkbox"].minimal-red, input[type="radio"].minimal-red\').iCheck({
      checkboxClass: \'icheckbox_minimal-red\',
      radioClass: \'iradio_minimal-red\'
    });
    //Flat red color scheme for iCheck
    $(\'input[type="checkbox"].flat-red, input[type="radio"].flat-red\').iCheck({
      checkboxClass: \'icheckbox_flat-green\',
      radioClass: \'iradio_flat-green\'
    });

});
', \yii\web\View::POS_END);