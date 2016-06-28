<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%customs_supervision}}".
 *
 * @property string $account
 * @property string $innerId
 * @property string $codeCpd
 * @property string $numberCpd
 * @property string $declarationNumber
 * @property string $contractNumber
 * @property string $importPort
 * @property string $responsibleCustoms
 * @property string $importDate
 * @property string $Share
 * @property string $feesApproved
 * @property string $hsCode
 * @property string $Record
 * @property string $auditStatus
 * @property integer $result
 *
 * @property Account $account0
 */
class CustomsSupervision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customs_supervision}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account', 'innerId'], 'required'],
            [['importDate'], 'safe'],
            [['result'], 'integer'],
            [['account'], 'string', 'max' => 32],
            [['innerId', 'numberCpd'], 'string', 'max' => 45],
            [['codeCpd'], 'string', 'max' => 12],
            [['declarationNumber'], 'string', 'max' => 18],
            [['contractNumber', 'importPort', 'responsibleCustoms', 'hsCode'], 'string', 'max' => 50],
            [['Share', 'feesApproved'], 'string', 'max' => 10],
            [['Record'], 'string', 'max' => 200],
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
            'innerId' => Yii::t('yii', 'Inner ID'),
            'codeCpd' => Yii::t('yii', '征免税证明编号	长度12位：固定位（5位）+年份（2位）+随机（5位），按《中华人民共和国进出口货物征免税证明表》（以下简称征免税证明表）中的编号填写'),
            'numberCpd' => Yii::t('yii', '征免税证明序号	若多个货物同时申报免税，根据在征免税证明表中货物序号排列，填写对应的序号'),
            'declarationNumber' => Yii::t('yii', '进口报关单编号	长度18位：海关编号（4位）+年份（4位）+进口标志（1位）+随机（9位），按征免税证明表填写'),
            'contractNumber' => Yii::t('yii', '合同号	按征免税证明表填写（最多50字）'),
            'importPort' => Yii::t('yii', '进口口岸	按征免税证明表填写（最多50字）'),
            'responsibleCustoms' => Yii::t('yii', '主管海关	按征免税证明表填写（最多50字）'),
            'importDate' => Yii::t('yii', '进口日期	按征免税证明表填写'),
            'Share' => Yii::t('yii', '申报共享标志	已申报共享，填写“是”，未申报共享，填写“否”'),
            'feesApproved' => Yii::t('yii', '收费标准已评议标志	收费标准已评议，填写“是”，未评议，填写“否” '),
            'hsCode' => Yii::t('yii', 'HS编码（税号）	按征免税证明表填写（最多50字）'),
            'Record' => Yii::t('yii', '后续管理记录	仪器的后续管理记录信息（最多200个字）'),
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
