<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


?>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'value' => "账号", 'class' => "text01 icon01"])->label('') ?>
<?= $form->field($model, 'password')->passwordInput(['class' => "text01 icon02"])->label("") ?>
<?= Html::submitButton('登录', ['class' => 'login-button button-bg01 fl', 'name' => 'login-button']) ?>
<input type="button" class="login-button button-bg02 fr" value="大仪平台授权登录">
<div style="display: none">
    <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </div>
<p class="fr"> <?= Html::a('注册', ['site/signup']) ?><span>|</span><a href="#">忘记密码?</a></p>
<?php ActiveForm::end(); ?>

