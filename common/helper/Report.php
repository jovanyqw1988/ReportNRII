<?php
/**
 * Created by PhpStorm.
 * User: haivk
 * Date: 2016/6/27
 * Time: 11:16
 */

namespace common\helper;

class Report
{
    public $insCode = "7025826f8aef4c88a27e21d9103c5dc2";
    public $instument_report_url = "http://localhost:8080/instru";
    public $service_effect_report_url = "http://localhost:8080/effect";
    public $reportList = [];
    private $instruType;

    public function setInstruType($instruType)
    {
        $this->instruType = intval($instruType);
    }

    public function addReportData($item)
    {
        $item['insCode'] = $this->insCode;
        array_push($this->reportList, $item);
    }

    /*
     * $description report instrument
     *$instruType instrument type
     * $json_data transport instrument paraments
     */
    public function instrument()
    {
        //set_time_limit(0);
        $data = [
            'insCode' => $this->insCode,
            'instruType' => $this->instruType,
            'instruData' => json_encode($this->reportList)
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->instument_report_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function serviceEffect()
    {
        //set_time_limit(0);
        $data = [
            'insCode' => $this->insCode,
            'instruType' => $this->instruType,
            'instruData' => json_encode($this->reportList)
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->service_effect_report_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}



//
//$report =new \common\models\Report();
//$jsondata ='{
// "cname":"激光干涉仪",
//"ename":"Laser",
//"innerId":"20000000",
// "insCode":"7025826f8aef4c88a27e21d9103c5dc2",
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
//}';
// $arr = json_decode($jsondata,true);
//  $response = $report->instrument(4,json_encode([$arr]));
//$jsondata='
//        {
//"insCode":"7025826f8aef4c88a27e21d9103c5dc2",
//"submittedRates":"95%",
//"activatedRates":"99%",
//"totalShareRates":"80%",
//"externalShareRates":"70%",
//"innovation":"仪器设备功能的升级改造5次；新技术和新方法的研究3种",
//"serviceAmounts":"样品测试30000个；对外服务机时15000小时；8次培训，培训586人次",
//"user":"共服务用户500人次，其中个人100人次、科研所200人次、高等院校200人次",
//"project":"省部级项目：15项；其他项目工程：1项 ",
//"thesis":"223篇",
//"book":"8个",
//"report":"15个",
//"patent":"12个",
//"output":"215条",
//"achievements":"100.00",
//"serviceIncome":"856.23",
//"socialBenefit":"产生4项社会效益，其中重大工程2项、企业创新1项、服务民生1项、应急事件0项",
//"remark":"其他成果"
//}
//';
//$arr = json_decode($jsondata,true);
//$response = $report->serviceEffect(7,json_encode([$arr]));