<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
<?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'text01 icon01','value'=>"账号"])->label("") ?>
<?= $form->field($model, 'password')->passwordInput(['value'=>"密码",'class'=>"text01 icon02"])->label("") ?>
<?= $form->field($model, 'phone')->textInput(['class'=>'text01 icon07','value'=>"手机号"])->label("") ?>
<?= $form->field($model, 'email')->textInput(['class'=>'text01 icon08','value'=>"邮箱"])->label("") ?>
<?= Html::submitButton('注册', ['class' => 'btn btn-primary login-button button-bg01 fl', 'name' => 'signup-button']) ?>
<?= Html::a('已有账号',['site/login'],['class'=>'login-button button-bg02 fr']) ?>
<?php ActiveForm::end(); ?>

