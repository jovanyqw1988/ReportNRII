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



class DayiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex(){
        $authorize_url = "http://218.249.73.245/instru_war/oauth2/authorize.ins";
        $redirect_uri='http://220.180.203.199:90/dayi/AuthResponse';
        $parames = ['client_id'=>'15992e8c-01a1-469b-bd5e-df4f11d94e24',
                    'redirect_uri'=>'',
                    'scope'=>'read',
                    'response_type'=>'code',
                    'state'=>'THISISSTATE'
        ];
        $url = $authorize_url."?".http_build_query($parames);
        $contents = file_get_contents($url); exit;
    }

    //大仪网站获取授权码
  public  function  actionAuthResponse(){
      $message="";
    $authorize_code = Yii::$app->getRequest()->params('code');
    if($authorize_code){
        $data=[
            'client_id'=>'15992e8c-01a1-469b-bd5e-df4f11d94e24',
            'client_secret'=>'7gq1VZeQyqN7cgc0no',
            'grant_type'=>'authorization_code',
            'code'=>'code',
            'redirect_uri'=>'http://220.180.203.199:90/dayi/AuthResponse'
        ];
        $uri="https://218.249.73.245/instru_war/oauth2/access_token.ins";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$uri);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $return = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($return);
        if($response['access_token']){
            $ch = curl_init();
            $uri = 'https://218.249.73.245/instru_war/oauth2/resource/userinfo.ins';
            curl_setopt($ch,CURLOPT_URL,$uri."?".http_build_query(array('access_token'=>$response['access_token'])));
            curl_setopt($ch,CURLOPT_HEADER,1);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            $resourse_data = curl_exec($ch);
            $resourse_arr = json_decode($resourse_data);
            if($resourse_arr){
                $user_model =    new \common\models\User();
               $user_row = $user_model->findOne(['username'=>$resourse_arr['username'],'email'=>$resourse_arr['email']]);
                if($user_row){


                }


            }else{
                exit('no user info');
            }

        }else{
            exit('access_token is error!');
        }


    }else{
        $message='无authorize_code!';
    }


  }

}