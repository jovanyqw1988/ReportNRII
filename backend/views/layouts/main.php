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
<body class="wapper">
<?php $this->beginBody() ?>
<div class="header"><h1>REPORT NRII</h1><span class="fr">
<div class="email">
    <i><b>20</b></i><em>站内邮件</em>

</div>
<div class="user"><i><img src="images/tx.jpg"></i><em><?php echo Yii::$app->user->identity->username;?></em>
    <em style="float: left"><?php echo  Html::beginForm(['/site/logout'], 'post',['id'=>"logoutform"])
        ."<a href='javascript:void(0);' class='logout' >Logout</a>"
        . Html::endForm();?></em>
</div></span></div>
<div class="main">
    <div class="main-left">
        <div class="menu-title">
            <h1>配置中心</h1>
        </div>
        <?php $action_id = Yii::$app->requestedAction->id;?>
        <div id="firstpane" class="menu_list">
            <h3 class="menu_head <?php if($action_id  == 'pageconnect' || $action_id  == 'index' ){?>current<?php }?>"><i class="icon03"></i><?=Html::a("数据库链接",["site/pageconnect"])?></h3>
            <div style="display:none" class="menu_body">
            </div>
            <h3 class="menu_head  <?php if($action_id  == 'page2'  ){?>current<?php }?>" ><i class="icon04"></i>数据类型</h3>
            <div style="<?php if($action_id  != 'page2'  ){?>display:none<?php }?>" class="menu_body">
                <?=Html::a("科学仪器中心",["site/page2"])?>
                <?=Html::a("大型科学装置",["site/page2"])?>
                <?=Html::a("科学仪器服务单元",["site/page2"])?>
                <?=Html::a("单台套科学仪器设备",["site/page2"])?>
                <?=Html::a("海关监管信息",["site/page2"])?>
                <?=Html::a("服务记录",["site/page2"])?>
                <?=Html::a("服务成效",["site/page2"])?>
            </div>
            <h3 class="menu_head"><i class="icon05"></i>系统参数</h3>
            <div style="display:none" class="menu_body">
                <a href="#">
                    国家平台参数</a>
            </div>
            <h3 class="menu_head <?php if($action_id  == 'page4'  ){?>current<?php }?>"><i class="icon06"></i><?=Html::a("上报",["site/page4"])?></h3>
            <div style="display:none" class="menu_body">
            </div>

        </div>

    </div>
    <div class="main-right">
        <?= $content ?>
    </div>

</div>
<?php $this->endBody() ?>

<script language="javascript">
    $(document).ready(function(){
        $("#firstpane .menu_body:eq(0)").show();
        $("#firstpane h3.menu_head").click(function(){
            $(this).addClass("current").next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
            $(this).siblings().removeClass("current");
        });
        $("#secondpane .menu_body:eq(0)").show();
        $("#secondpane h3.menu_head").mouseover(function(){
            $(this).addClass("current").next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
            $(this).siblings().removeClass("current");
        });
    });
    $(".logout").click(function(){
        $("#logoutform").submit();
    })
</script>
</body>
</html>
<?php $this->endPage() ?>
