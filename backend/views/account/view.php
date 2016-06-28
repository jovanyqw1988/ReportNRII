<?php

$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', '平台用户'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', '创建平台用户'), 'url' => ['create']];
$this->params['breadcrumbs'][] = Yii::t('yii', '消息结果');
$this->beginBlock('content-header');
?>
<h1><?= Yii::t('yii', '创建平台用户') ?>
    <small><?= Yii::t('yii', '消息结果') ?></small>
</h1>
<?php $this->endBlock(); ?>
<div class="error-page">
    <h4 class="headline text-success">OK</h4>

    <div class="error-content">
        <h3><i class="fa fa-warning text-success">您新创建的账号资料如下：</i>
        </h3>
        <ul>
            <li>昵称：<?= $model->pf_desc ?></li>
            <li>账号：<?= $model->account ?></li>
            <li>简介：<?= $model->pf_desc ?></li>
        </ul>
    </div>

    <form class='search-form'>
        <div class='input-group'>
            <input type="text" name="search" class='form-control' placeholder="Search"/>

            <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

</div>
<!-- /.error-page -->
