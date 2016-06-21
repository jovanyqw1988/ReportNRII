<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="login-wapper">
    <div class="login-box">
        <div class="login-title">
            <h1>REPORT NRII</h1>
            <h2>重大科研基础设施和大型科研仪器数据上报系统</h2>
            <p>Major research infrastructure and large scientific instrument data reporting system</p>

        </div>
        <DIV class="login-main">
            <?=$content;?>
        </DIV>

    </div>


</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
