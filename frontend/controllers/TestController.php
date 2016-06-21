<?php
/**
 * Created by PhpStorm.
 * User: haivk
 * Date: 2016/6/3
 * Time: 11:39
 */
namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;


class TestController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        echo json_encode($_POST); exit;
    }

}