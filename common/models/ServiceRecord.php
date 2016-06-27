<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%service_record}}".
 *
 * @property string $account
 * @property string $innerId
 * @property double $amounts
 * @property string $serviceTime
 * @property string $serviceContent
 * @property string $serviceWay
 * @property string $serviceAmount
 * @property string $subjectName
 * @property string $subjectIncome
 * @property string $subjectArea
 * @property string $subjectContent
 * @property string $applicant
 * @property string $applicatPhone
 * @property string $applicatEmail
 * @property string $applicatUnit
 * @property string $comment
 * @property string $auditStatus
 * @property integer $result
 *
 * @property Account $account0
 */
class ServiceRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_record}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account', 'innerId'], 'required'],
            [['amounts'], 'number'],
            [['result'], 'integer'],
            [['account'], 'string', 'max' => 32],
            [['innerId', 'serviceTime', 'subjectName', 'subjectIncome', 'subjectArea'], 'string', 'max' => 45],
            [['serviceContent', 'subjectContent'], 'string', 'max' => 200],
            [['serviceWay'], 'string', 'max' => 15],
            [['serviceAmount', 'comment'], 'string', 'max' => 10],
            [['applicant', 'applicatPhone'], 'string', 'max' => 20],
            [['applicatEmail', 'applicatUnit'], 'string', 'max' => 50],
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
            'innerId' => Yii::t('yii', '所在单位仪器内部编号	管理单位资产管理部门赋予该仪器设备唯一编号'),
            'amounts' => Yii::t('yii', '服务金额	实际服务的总额，以元为单位'),
            'serviceTime' => Yii::t('yii', '实际服务时间	科研设施与仪器向用户实际提供服务的日期或时间段'),
            'serviceContent' => Yii::t('yii', '实际服务内容	科研设施与仪器向用户实际提供的服务项目，如样品测试、分析检测等，最多200字'),
            'serviceWay' => Yii::t('yii', '服务方式	一是占用共享，即服务客体(需求者)按一定规程自行操作使用；二是技术共享，即在服务主体的技术指导下，服务客体有限度地自主使用操作仪器设备；三是委托共享，即受服务客体委托，由服务主体按要求启动和运行仪器设备，并向委托方提交相应结果；四是远程共享；五是其他（可多选）'),
            'serviceAmount' => Yii::t('yii', '服务量	根据订单，科研设施与仪器所提供的服务量，根据仪器类型和服务方式的不同，可按所占用的时长或次数（包含必要开机准备时间、测试时间和必须的后处理时间，不包括空载运行的时间，计量单位为小时）、样品测试数量、分析检测数量、技术指导次数等该领域统计方法计算。'),
            'subjectName' => Yii::t('yii', '课题名称	用户利用科研设施与仪器所支撑的课题名称（没有则填写“无”）'),
            'subjectIncome' => Yii::t('yii', '课题经费来源	课题最主要的经费来源，可多选（最多4个）：
A 国家重大科技专项；B 国家自然科学基金；C 863计划；D 国家科技支撑（攻关）计划；E 火炬计划；F 星火计划；G 973计划；H 211工程；I 985工程；J 公益性行业科研专项；K 国家社会科学基金；L 国家科技基础性工作专项；M 科技基础条件平台专项；N 除上述国家计划外由中央政府部门下达的课题；O 地方科技计划项目；P 其他
例：863计划'),
            'subjectArea' => Yii::t('yii', '课题主要学科领域	用户申请机时进行研究的课题所属的主要学科领域，按国家标准《学科分类与代码》（GB/T 13745-2009）选择填写主要学科名称，涉及多个学科领域的可多选（最多4个，一级学科）
力学，数学,化学'),
            'subjectContent' => Yii::t('yii', '课题研究内容	用户利用科研设施与仪器所研究的课题的基本内容概述（最多200字）（没有则填写“无”）'),
            'applicant' => Yii::t('yii', '申请人	申请人的姓名（最多20字）'),
            'applicatPhone' => Yii::t('yii', '申请人电话	申请人的电话号码，座机（加区号）或手机（最多20字）以座机为主'),
            'applicatEmail' => Yii::t('yii', '申请人电子邮箱	申请人的电子邮箱（最多50字）'),
            'applicatUnit' => Yii::t('yii', 'Applicat Unit'),
            'comment' => Yii::t('yii', '用户评价及意见	用户对本次服务的评价，非常满意、基本满意、一般、不满意、极差（单选）。具体的意见和建议'),
            'auditStatus' => Yii::t('yii', '提交状态：-1或0
-1未提交，代表后期需要对数据进行重复报，更新完善数据；
0提交，代表报送的数据无误，后期无需更新完善。已经提交的数据，再次推送更新无效，需等待后期审核驳回再进行修改。
如果因为失误提交，请等待国家平台审核驳回后更新。'),
            'result' => Yii::t('yii', 'Result'),
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
