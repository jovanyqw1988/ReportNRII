<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%service_effect}}".
 *
 * @property string $account
 * @property string $submittedRates
 * @property string $activatedRates
 * @property string $totalShareRates
 * @property string $externalShareRates
 * @property string $Innovation
 * @property string $serviceAmounts
 * @property string $user
 * @property string $Project
 * @property string $Thesis
 * @property string $Book
 * @property string $Report
 * @property string $Patent
 * @property string $Output
 * @property string $Achievements
 * @property string $serviceIncome
 * @property string $socialBenefit
 * @property string $Remark
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Account $account0
 */
class ServiceEffect extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_effect}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['account'], 'string', 'max' => 32],
            [['submittedRates', 'activatedRates', 'totalShareRates', 'externalShareRates', 'Innovation', 'serviceAmounts', 'user', 'serviceIncome'], 'string', 'max' => 45],
            [['Project', 'Thesis', 'Book', 'Report', 'Patent', 'Output', 'Achievements', 'socialBenefit', 'Remark'], 'string', 'max' => 200],
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
            'submittedRates' => Yii::t('yii', '科研设施与仪器入网比例	指该管理单位在国家网络管理平台注册填报的科研设施与仪器占符合申报条件的全部科研设施与仪器的比例，体现了纳入国家网络管理平台的情况'),
            'activatedRates' => Yii::t('yii', '正常运行设备比例	纳入国家网络管理平台的科研设施与仪器正常运行的数量占纳入的全部科研设施与仪器数量的比例'),
            'totalShareRates' => Yii::t('yii', '参与共享比例	指参与共享（包括内部共享和外部共享两种方式）的科研设施与仪器和全部符合共享条件科研设施与仪器的数量之比，体现了总体开放共享服务的情况'),
            'externalShareRates' => Yii::t('yii', '外部共享比例	指提供对外服务的科研设施与仪器占全部符合共享条件的科研设施与仪器的比例，体现了对外开放共享服务的比例情况'),
            'Innovation' => Yii::t('yii', '仪器创新开发	管理单位仪器功能开发、新技术和新方法的研究、仪器设备功能的升级改造、仪器研究能力、科研设施与仪器自主创新研发能力的情况及数量（最多500字）'),
            'serviceAmounts' => Yii::t('yii', '服务总量	科研设施与仪器对外提供服务的总量，根据仪器类型和服务方式的不同，包括设备机时服务、样品测试数量、分析检测服务、培训等（最多200字）'),
            'user' => Yii::t('yii', '用户类型及数量	科研设施与仪器服务用户的类型及数量（单位：人/次）'),
            'Project' => Yii::t('yii', '支撑项目	科研设施与仪器对外服务，用户完成的各种科研项目或合作项目数的数量，特别是服务各级各类科技计划（专项、基金、重大工程）等情况（最多200字）'),
            'Thesis' => Yii::t('yii', '支撑论文	用户利用科研设施与仪器所产生的论文数量，包括已公开发表的论文，或者尚未正式发表但已被录用的论文，特别是在三大检索SCI、EI、ISTP发表的论文，最多200字'),
            'Book' => Yii::t('yii', '支撑论著	用户利用科研设施与仪器所产生的论著或专著数量（最多200字）'),
            'Report' => Yii::t('yii', '支撑科技报告	用户利用科研设施与仪器所产生的科技报告数量（最多200字）'),
            'Patent' => Yii::t('yii', '支撑发明专利	用户利用科研设施与仪器所产生的发明专利的数量，指已授权发明专利数，不含实用新型和外观设计（最多200字）'),
            'Output' => Yii::t('yii', '产出科学数据	用户使用科研设施与仪器过程中产生的原始数据及研究分析数据，包括调查观测、测试化验、实验研究等相关科学数据（最多200字）'),
            'Achievements' => Yii::t('yii', '科技成果及获奖情况	使用科研设施与仪器产生的科技成果及获奖成果数量（最多200字）'),
            'serviceIncome' => Yii::t('yii', '对外服务收入	管理单位科研设施与仪器对外服务获得的收入，以人民币计算（单位万元，保留小数点后两位）。包括科研设施与仪器对外提供服务收入的测试费、租赁收入和其他服务收入等'),
            'socialBenefit' => Yii::t('yii', '社会效益	科研设施与仪器对外开放共享所产生的社会效益，如服务重大工程、企业创新、服务民生、应急事件、科学普及、政府决策、其他等情况（最多500字）'),
            'Remark' => Yii::t('yii', '其他成果	非上述成果之外的成果（最多200字）'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
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
