<?php
namespace backend\controllers;

use backend\models\AccountForm;use Yii;use yii\filters\VerbFilter;use yii\web\Controller;

/**
 * Site controller
 */
class AccountController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new AccountForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->create()) {
                return $this->render('view', [
                    'model' => $user,
                ]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }


}
