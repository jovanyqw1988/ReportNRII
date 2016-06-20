<?php

/* @var $this yii\web\View */

$this->params['breadcrumbs'][] = 'About';

$this->beginBlock('content-header'); ?>
About
<small>static page</small>
<?php $this->endBlock(); ?>

<div class="site-about">
    <p> This is the About page. You may modify the following file to customize its content: </p>
    <code><?= __FILE__ ?></code>
</div>