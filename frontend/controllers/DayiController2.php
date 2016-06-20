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

    public function actionResponse()
    {
        set_time_limit(0);
        $insCode = "7025826f8aef4c88a27e21d9103c5dc2";
        $data_all_keys = [
//                              '1'=> [
//                                'cname' => 'zkd北京电子能谱中心',
//                                'innerId' => '45',
//                                'insCode' => '7025826f8aef4c88a27e21d9103c5dc2',
//                                'level' => '国家级',
//                                'url' => 'http://www.escience.net.cn',
//                                'establish' => '2002-07-01',
//                                'type' => '通用',
//                                'subject' => '化学，物理学',
//                                'serviceContent' => '样品测试、分析检测',
//                                'achievement' => 'XXX项目组利用北京电子能谱中心的纳米扫描俄歇系统对ZTO薄膜成分进行纳米尺寸研究。相关研究成果获得了2011年度国家技术发明一等奖',
//                                'requirement' => '用户可通过上网、邮件、电话等形式按要求填写实验登记，并预约测试时间',
//                                'fee' => '一小时内500元，超出一小时部分按每小时400元收费',
//                                'serviceUrl' => 'http://www.ServiceUrl.com/order',
//                                'contact' => '张三',
//                                'phone' => '010-64411957',
//                                'email' => 'zhangsan@qq.com',
//                                'province' => '河北省',
//                                'city' => '廊坊市',
//                                'county' => '安次区',
//                                'street' => '万达广场东门',
//                                'postalcode' => '100000',
//                                'shareMode' => '不共享',
//                                'image' => 'http://218.249.73.246/g196.jpg',
//                                'auditStatus' => '-1'
//                            ],
//            "2"=>json_decode( '{
//"cname":"同步辐射光源",
//"ename":"Synchrotron Radiation Facility（SSFR）",
//"innerId":"000001",
// "insCode":"'.$insCode.'",
//"url":"http://www.escience.net.cn",
//"worth":50000,
//"nation":"中国",
//"beginDate":"2016-01-01",
//"type":"专用",
//"technical":"光源由150MeV电子直线加速器、3.5GeV增强器、3.5GeV电子储存环（周长为432米）以及沿环外侧分布的同步辐射光束线和实验站组成",
//"function":"用于蓄电池电压、电流等性能的检测",
//"subject":"力学",
//"serviceContent":"矢量网络分析仪,微波频域参数测量,微波时域参数测量,微波信号源,微波功率测量",
//"achievement":"为国家863项目提供了设备支持",
//"status":"正常",
//"requirement":"只对系统内认证的用户开放共享",
//"fee":"一小时内500元，超出一小时部分按每小时400元收费",
//"serviceUrl":"http://www.ServiceUrl.com/order",
//"province":"河北省",
//"city":"保定市",
//"county":"北市区",
//"street":"学院路37号",
//"contact":"张三",
//"phone":"010-82053588",
//"email":"zhangsan@qq.com",
//"address":"北京市海淀区北京航空航天大学新主楼201",
//"postalcode":"100000",
//"shareMode":"不共享",
//"image":"http://218.249.73.246/g/gw196.jpg",
//"auditStatus":"-1"
//}
//',true),
//            "3"=>json_decode('{
//"cname":"飞行器结构动力学实验室",
//"innerId":"2222222",
// "insCode":"'.$insCode.'",
//"establish":"2016-01-08",
//"type":"专用",
//"function":"主要用于硅材料的表面轮廓测试形成三维图像，对微纳结构进行分析测量",
//"subject":"力学,数学",
//"serviceContent":"矢量网络分析仪,微波频域参数测量,微波时域参数测量,微波信号源,微波功率测量",
//"achievement":"为国家863项目提供了设备支持",
//"status":"正常",
//"requirement":"只对系统内认证的用户开放共享",
//"fee":"一小时内500元，超出一小时部分按每小时400元收费",
//"serviceUrl":"http://www.ServiceUrl.com/order",
//"province":"河北省",
//"city":"保定市",
//"county":"北市区",
//"street":"万达广场东门",
//"contact":"张三",
//"phone":"022-23508336",
//"email":"zhangsan@qq.com",
//"address":"北京市海淀区北京航空航天大学新主楼201",
//"postalcode":"100000",
//"shareMode":"不共享",
//"image":"http://218.249.73.246/g/gw196.jpg",
//"auditStatus":"-1"
//}',true),
//"4"=>json_decode('
//{
//"cname":"激光干涉仪",
//"ename":"Laser",
//"innerId":"20000000",
// "insCode":"'.$insCode.'",
//"instrBelongsType":1,
//"instrBelongsName":"000001",
//"instrCategory":"030122",
//"instrSource":"购置",
//"instrSupervise":"是",
//"worth":"67.81",
//"nation":"阿富汗",
//"manufacturer":"Renishaw",
//"beginDate":"2015-07-14",
//"type":"专用",
//"instrVersion":"ML-10",
//"technical":"测量用",
//"function":"角摆等运动误差参数测量",
//"subject":"数学，力学，林学",
//"serviceContent":"矢量网络分析仪,微波频域参数测量,微波时域参数测量,微波信号源,微波功率测量",
//"achievement":"为国家863项目提供了设备支持",
//"status":"正常",
//"requirement":"只对系统内认证的用户开放共享",
//"fee":"一小时内500元，超出一小时部分按每小时400元收费",
//"serviceUrl":"http://www.ServiceUrl.com/order",
//"province":"河北省",
//"city":"廊坊市",
//"county":"安次区",
//"street":"学院路37号",
//"contact":"张三",
//"phone":"010-64524931",
//"email":"zhangsan@qq.com",
//"address":"北京市海淀区北京航空航天大学新主楼201",
//"postalcode":"100000",
//"shareMode":"内部共享",
//"image":"http://218.249.73.246/g/gw196.jpg",
//"auditStatus":"-1"
//}',true),
//            '5'=>json_decode('{
//"innerId":"20000000",
// "insCode":"'.$insCode.'",
//"codeCpd":"20113142937",
//"numberCpd":"1",
//"declarationNumber":"0001201413928493",
//"contractNumber":"2029482",
//"importPort":"XX海关",
//"responsibleCustoms":"XX海关",
//"importDate":"2013-02-01",
//"share":"是",
//"feesApproved":"是",
//"hsCode":"283929182",
//"record":"X年X月，设备在符合监管条件的前提下，对其他科研用户开展非营利性服务，对外开放共享",
//"auditStatus":"-1"
//}',true),
//            '6'=>json_decode('{
//"innerId":"20000000",
//"insCode":"'.$insCode.'",
//"amounts":"12000",
//"serviceTime":"3",
//"serviceContent":"样品深度剖析",
//"serviceWay":"占用共享",
//"serviceAmount":"12.3",
//"subjectName":"石墨烯的光电器件研究",
//"subjectIncome":"863计划",
//"subjectArea":"力学，数学,化学",
//"subjectContent":"通过高温裂解富含不同掺杂元素的反应物，调制掺杂规模制备高质量的硼氮分区掺杂石墨烯",
//"applicant":"张三",
//"applicantPhone":"010-69460000",
//"applicantEmail":"test111@buaa.edu.cn",
//"applicantUnit":"北京航空航天大学",
//"comment":"非常满意",
//"auditStatus":"-1"
//}',true),
            '7'=>json_decode('{
"insCode":"'.$insCode.'",
"submittedRates":"95%",
"activatedRates":"99%",
"totalShareRates":"80%",
"externalShareRates":"70%",
"innovation":"仪器设备功能的升级改造5次；新技术和新方法的研究3种",
"serviceAmounts":"样品测试30000个；对外服务机时15000小时；8次培训，培训586人次",
"user":"共服务用户500人次，其中个人100人次、科研所200人次、高等院校200人次",
"project":"省部级项目：15项；其他项目工程：1项 ",
"thesis":"223篇",
"book":"8个",
"report":"15个",
"patent":"12个",
"output":"215条",
"achievements":"100.00",
"serviceIncome":"856.23",
"socialBenefit":"产生4项社会效益，其中重大工程2项、企业创新1项、服务民生1项、应急事件0项",
"remark":"其他成果"
}',true)
        ];
//        if($data_all_keys){
//            foreach($data_all_keys as $type=>$keys){
//                $this->testYiqi($type,$keys);
//            }
//        }
        if($data_all_keys){
            foreach($data_all_keys as $type=>$keys){
                $this->testEffect($type,$keys);
            }
        }
    }


    public function testYiqi($instruType = 1, $data_all_keys = array(), $insCode = '7025826f8aef4c88a27e21d9103c5dc2')
    {
        echo $instruType . '<br><br><br><br><br>------' . "<br>";
        $url = "http://localhost:8080/instru";
        $data_arr['all'] = $data_all_keys;
        if ($data_all_keys) {
            foreach ($data_all_keys as $k => $v) {
                if ($k == 'insCode') {
                    continue;
                }
                $arr1 = $data_all_keys;
                $arr1[$k] = '';
                $data_arr[$k] = $arr1;
            }
        }
    }
    public function testEffect($instruType = 1, $data_all_keys = array(), $insCode = '7025826f8aef4c88a27e21d9103c5dc2')
    {
        $url = "http://localhost:8080/effect";
        $data_arr['all'] = $data_all_keys;
        if ($data_all_keys) {
            foreach ($data_all_keys as $k => $v) {
                if ($k == 'insCode') {
                    continue;
                }
                $arr1 = $data_all_keys;
                $arr1[$k] = '';
                $data_arr[$k] = $arr1;
            }
        }
        foreach ($data_arr as $k => $v) {
            $data = [
                'insCode' => '7025826f8aef4c88a27e21d9103c5dc2',
                'instruType' => $instruType,
                'effectData' => json_encode([$v])
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $return = curl_exec($ch);
            curl_close($ch);
            echo $k . '------' . $return . "<br>";
        }
    }



    public function actionTest()
    {
        $client = new \SoapClient('http://218.249.73.248:8080/WS_Server/cxf/instru?wsdl');
        $data = [
            'cname' => 'zkd北京电子能谱中心',
            'innerId' => '45',
            'insCode' => '44064290c18e4b0bb19f32e0048a6b9b',
            'level' => '国家级',
            'url' => 'http://www.escience.net.cn',
            'establish' => '2002-07-01',
            'type' => '通用',
            'subject' => '化学，物理学',
            'serviceContent' => '样品测试、分析检测',
            'achievement' => 'XXX项目组利用北京电子能谱中心的纳米扫描俄歇系统对ZTO薄膜成分进行纳米尺寸研究。相关研究成果获得了2011年度国家技术发明一等奖',
            'requirement' => '用户可通过上网、邮件、电话等形式按要求填写实验登记，并预约测试时间',
            'fee' => '一小时内500元，超出一小时部分按每小时400元收费',
            'serviceUrl' => 'http://www.ServiceUrl.com/order',
            'contact' => '张三',
            'phone' => '010-64411957',
            'email' => 'zhangsan@qq.com',
            'province' => '河北省',
            'city' => '廊坊市',
            'county' => '安次区',
            'street' => '万达广场东门',
            'postalcode' => '100000',
            'shareMode' => '不共享',
            'image' => 'http://218.249.73.246/g196.jpg',
            'auditStatus' => '-1'
        ];


        // new \SoapServer()
        //  echo(json_encode($data)); exit;
//        try {
        $paramter = ["insCode" => '44064290c18e4b0bb19f32e0048a6b9b', "instruType" => 1, "instruList" => json_encode($data)];
        // $paramter = ['44064290c18e4b0bb19f32e0048a6b9b',1,json_encode($data)];
        $aa = $client->instruInfo($paramter);
        var_dump($aa);
//        } catch (\SoapFault $fault) {d
//            echo "Error: ", $fault->faultcode, ", string: ", $fault->faultstring;
//        }

        exit;
    }

    public function actionIndex()
    {

        $authorize_url = "http://218.249.73.245/instru_war/oauth2/authorize.ins";
        $redirect_uri = 'http://220.180.203.199:90';
        $parames = ['client_id' => '15992e8c-01a1-469b-bd5e-df4f11d94e24',
            'response_type' => "code",
            'redirect_uri' => $redirect_uri,
            'scope' => 'read',
            'state' => 'STATE'
        ];
        $url = $authorize_url . "?" . urlencode(http_build_query($parames));// echo $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
        $return = curl_exec($ch);
        curl_close($ch); var_dump($url,$return);
        exit;
    }

    //大仪网站获取授权码
    public function  actionAuthResponse()
    {
        $message = "";
        $authorize_code = Yii::$app->getRequest()->params('code');
        if ($authorize_code) {
            $data = [
                'client_id' => '15992e8c-01a1-469b-bd5e-df4f11d94e24',
                'client_secret' => '7gq1VZeQyqN7cgc0no',
                'grant_type' => 'authorization_code',
                'code' => 'code',
                'redirect_uri' => 'http://220.180.203.199:90/dayi/AuthResponse'
            ];
            $uri = "https://218.249.73.245/instru_war/oauth2/access_token.ins";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $uri);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $return = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($return);
            if ($response['access_token']) {
                $ch = curl_init();
                $uri = 'https://218.249.73.245/instru_war/oauth2/resource/userinfo.ins';
                curl_setopt($ch, CURLOPT_URL, $uri . "?" . http_build_query(array('access_token' => $response['access_token'])));
                curl_setopt($ch, CURLOPT_HEADER, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $resourse_data = curl_exec($ch);
                $resourse_arr = json_decode($resourse_data);
                if ($resourse_arr) {
                    $user_model = new \common\models\User();
                    $user_row = $user_model->findOne(['username' => $resourse_arr['username'], 'email' => $resourse_arr['email']]);
                    if ($user_row) {


                    }


                } else {
                    exit('no user info');
                }

            } else {
                exit('access_token is error!');
            }


        } else {
            $message = '无authorize_code!';
        }


    }

}