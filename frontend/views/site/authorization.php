<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign Up';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="register-box">
    <div class="register-logo">
        <a href="<?= Url::toRoute(['site/login']) ?>"><b>Report</b> NRII</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="<?= Yii::$app->homeUrl ?>" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8 pull-right">
                    <button type="submit"
                            class="btn btn-primary btn-block btn-flat"><?= Yii::t('yii', 'Authorization') ?></button>
                </div><!-- /.col -->
            </div>
        </form>

    </div><!-- /.form-box -->
</div><!-- /.register-box -->