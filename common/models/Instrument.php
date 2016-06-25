<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%instrument}}".
 *
 * @property string $account
 * @property string $innerId
 * @property string $user
 * @property integer $instrument
 * @property string $canme
 * @property string $ename
 * @property string $instrBelongsType
 * @property string $InstrBelongsName
 * @property string $instrCategory
 * @property string $instrSource
 * @property string $instrSupervise
 * @property string $level
 * @property string $url
 * @property double $worth
 * @property string $establish
 * @property string $nation
 * @property string $manufacturer
 * @property string $beginDate
 * @property string $type
 * @property string $instrVersion
 * @property string $technical
 * @property string $function
 * @property string $subject
 * @property string $serviceContent
 * @property string $achievement
 * @property string $status
 * @property string $requirement
 * @property string $fee
 * @property string $serviceUrl
 * @property string $province
 * @property string $city
 * @property string $county
 * @property string $street
 * @property string $contact
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $postalcode
 * @property string $shareMode
 * @property string $image
 * @property string $auditStatus
 *
 * @property Account $account0
 */
class Instrument extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%instrument}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account', 'innerId', 'user', 'instrument', 'image'], 'required'],
            [['instrument'], 'integer'],
            [['worth'], 'number'],
            [['establish', 'beginDate'], 'safe'],
            [['technical', 'function', 'achievement', 'requirement', 'fee'], 'string'],
            [['account'], 'string', 'max' => 32],
            [['innerId', 'user', 'instrBelongsType', 'InstrBelongsName', 'nation', 'province', 'city', 'county', 'street'], 'string', 'max' => 45],
            [['canme', 'email'], 'string', 'max' => 50],
            [['ename', 'url', 'manufacturer', 'instrVersion', 'address'], 'string', 'max' => 100],
            [['instrCategory', 'postalcode'], 'string', 'max' => 6],
            [['instrSource', 'instrSupervise', 'level', 'type', 'status', 'shareMode'], 'string', 'max' => 10],
            [['subject', 'serviceContent'], 'string', 'max' => 200],
            [['serviceUrl', 'image'], 'string', 'max' => 150],
            [['contact', 'phone'], 'string', 'max' => 20],
            [['auditStatus'], 'string', 'max' => 2],
            [['account'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account' => 'account']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'account' => Yii::t('yii', 'Account'),
            'innerId' => Yii::t('yii', '所在单位仪器内部编码	仪器所在单位系统内部id，能唯一标识仪器'),
            'user' => Yii::t('yii', 'User'),
            'instrument' => Yii::t('yii', '填报数据类型
1代表科学仪器中心
2代表大型科学装置
3代表科学仪器服务单元
4代表单台套科学仪器设备
5代表海关监管信息
6代表服务记录'),
            'canme' => Yii::t('yii', '仪器中心名称	科学仪器中心全称，不可简写（最多50字）'),
            'ename' => Yii::t('yii', 'Ename'),
            'instrBelongsType' => Yii::t('yii', '所属大型科学装置/仪器中心/服务单元	仪器设备所隶属的科学仪器中心（1）、大型科学装置（2）或服务单元（3）（无隶属关系可填写“无”）'),
            'InstrBelongsName' => Yii::t('yii', '隶属仪器所在单位仪器内部编号	确定隶属大型科学装置/仪器中心/服务单元唯一的一台仪器。（无隶属关系可填写“无”）'),
            'instrCategory' => Yii::t('yii', '设备分类编码	依据“大型科学仪器设备资源的建设与整合”平台建设项目的《大型科学仪器设备分类标准与编码规则（试用）》，按大类、中类、小类选择填写（6位数字代码）'),
            'instrSource' => Yii::t('yii', '仪器设备来源	购置、研制、赠送、其他'),
            'instrSupervise' => Yii::t('yii', '海关监管情况	仪器是否被海关监管，若仪器被海关监管，填写“是”，若仪器不被海关监管，填写“否”'),
            'level' => Yii::t('yii', '仪器中心级别	国家级、省部级、地市级或单位级等（单选，以所属最高级别为准）'),
            'url' => Yii::t('yii', '装置网站的网址	提供科学装置所在网站的URL'),
            'worth' => Yii::t('yii', '原值	科学装置的购置单价或研制成本，按资产登记价格填写。国产科学装置以人民币填报，进口科学装置根据建账时的汇率折合成人民币计算（单位为万元，保留2位小数），优惠价及赠送仪器按市场价或资产登记价格填写'),
            'establish' => Yii::t('yii', 'Establish'),
            'nation' => Yii::t('yii', '产地国别	科学装置的实际制造地所在国家或地区，按国家标准《世界各国和地区名称代码》（GB/T 2659-2000）选择填写，自主研发的填写中国；国家简称'),
            'manufacturer' => Yii::t('yii', '生产制造商	仪器设备生产或设计制造单位的全称（非代理商），自主研发需填写本单位（最多100字）'),
            'beginDate' => Yii::t('yii', '启用日期	科学装置投入使用的日期（按YYYY-MM-DD格式填写）'),
            'type' => Yii::t('yii', '科学仪器中心类别	通用或专用'),
            'instrVersion' => Yii::t('yii', '规格型号	按仪器设备生产制造厂商的标识填写（最多100字）'),
            'technical' => Yii::t('yii', '主要线站与仪器设备及技术指标	构成科学装置的核心线站、主要仪器设备的名称、型号以及能代表仪器设备主要技术性能的指标或参数 （最多500字）'),
            'function' => Yii::t('yii', '主要功能	对科学装置主要功能的简要介绍（最多300个字）'),
            'subject' => Yii::t('yii', '主要学科领域	按国家标准《学科分类与代码》（GB/T 13745-2009）选择填写仪器中心支持科技活动的主要学科名称，涉及多个学科领域的可多选（最多4个）（一级学科）
如：化学，物理学'),
            'serviceContent' => Yii::t('yii', '服务内容	科学仪器中心提供的各类服务项目描述，如样品测试、分析检测、技术咨询、认证服务等（最多200字）
'),
            'achievement' => Yii::t('yii', '服务的典型成果	列举该科学仪器中心面向社会提供服务、支撑重大项目或主要成果的典型案例（1-3个，没有可填写无）、（最多500字）'),
            'status' => Yii::t('yii', '运行状态	指科学装置当年通常技术性能状态，按正常、待机、远程服务中、偶有故障、故障频繁、待修、待报废选择填写（单选）。按科学装置当年一般状况下的运行状态填写，并非填报时的特定状态'),
            'requirement' => Yii::t('yii', '对外开放共享规定	用户申请条件、申请方式、申请时间、申请流程、申请材料、服务时间安排等的方面的要求（最多500字）'),
            'fee' => Yii::t('yii', '参考收费标准	对外开放相关收费标准，为用户提供服务时收取的费用，按照单位已有收费标准填写。是对仪器中心现有收费标准的概述，无需精确到每台仪器（最多500字）'),
            'serviceUrl' => Yii::t('yii', '预约服务网址	管理单位在线服务平台提供的用户在线预约获取服务接口的URL，能够实现对本仪器中心仪器的预约申请（最多150字）'),
            'province' => Yii::t('yii', '科学装置所在的详细地理位置（最多100字），标准格式：
省（自治区、直辖市）、
市、
区（县）、
街道（乡镇，需包括街道/乡镇门牌号）'),
            'city' => Yii::t('yii', '科学装置所在的详细地理位置（最多100字），标准格式：
省（自治区、直辖市）、
市、
区（县）、
街道（乡镇，需包括街道/乡镇门牌号）'),
            'county' => Yii::t('yii', '科学装置所在的详细地理位置（最多100字），标准格式：
省（自治区、直辖市）、
市、
区（县）、
街道（乡镇，需包括街道/乡镇门牌号）'),
            'street' => Yii::t('yii', '科学装置所在的详细地理位置（最多100字），标准格式：
省（自治区、直辖市）、
市、
区（县）、
街道（乡镇，需包括街道/乡镇门牌号）'),
            'contact' => Yii::t('yii', '联系人	联系人姓名（最多20字）'),
            'phone' => Yii::t('yii', '电话	联系人的电话号码，座机（加区号）或手机，以联系人座机为主，一个电话号码即可'),
            'email' => Yii::t('yii', '电子邮箱	联系人的电子邮箱（最多50字）'),
            'address' => Yii::t('yii', '通讯地址	联系人的办公地址，标准格式：省（自治区、直辖市）、市、区（县）、街道（乡镇）（最多100字）'),
            'postalcode' => Yii::t('yii', '邮政编码	联系人办公地址的邮政编码，6位'),
            'shareMode' => Yii::t('yii', '共享模式	内部共享、外部共享、不共享'),
            'image' => Yii::t('yii', '仪器中心图片	科学仪器中心图片对应的URL（外网可以访问的图片url），图片要求1M字节以内，jpg格式'),
            'auditStatus' => Yii::t('yii', '提交状态：-1或0
-1未提交，代表后期需要对数据进行重复报，更新完善数据；
0提交，代表报送的数据无误，后期无需更新完善。已经提交的数据，再次推送更新无效，需等待后期审核驳回再进行修改。
如果因为失误提交，请等待国家平台审核驳回后更新。'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount0()
    {
        return $this->hasOne(Account::className(), ['account' => 'account']);
    }
}
