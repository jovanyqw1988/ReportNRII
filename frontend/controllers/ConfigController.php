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
 * 所有的配置都在这里进行
 */
class ConfigController extends Controller
{
    /**
     * 配置总览
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'head' => ''
        ]);
    }

    public function actionDatabase()
    {
        return $this->render('database');
    }

    public function actionType($id)
    {
        return $this->render('type', [
            'id' => $id
        ]);
    }

    public function actionSystem()
    {
        return $this->render('system');
    }


}