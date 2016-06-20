<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/20
 * Time: 14:42
 */
namespace frontend\controllers;

use yii\web\Controller;

/**
 * 所有的上报功能都在这里进行
 */
class ReportController extends Controller
{
    /**
     * 配置总览
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}