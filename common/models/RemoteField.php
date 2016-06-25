<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%remote_field}}".
 *
 * @property string $account
 * @property integer $type
 * @property string $field
 * @property string $remote_field
 * @property integer $is_index
 *
 * @property InstrumentConfig $type0
 */
class RemoteField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%remote_field}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account', 'type', 'field'], 'required'],
            [['type', 'is_index'], 'integer'],
            [['account'], 'string', 'max' => 20],
            [['field', 'remote_field'], 'string', 'max' => 45],
            [['type', 'account'], 'exist', 'skipOnError' => true, 'targetClass' => InstrumentConfig::className(), 'targetAttribute' => ['type' => 'type', 'account' => 'account']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'account' => Yii::t('yii', 'Account'),
            'type' => Yii::t('yii', 'Type'),
            'field' => Yii::t('yii', 'Field'),
            'remote_field' => Yii::t('yii', 'Remote Field'),
            'is_index' => Yii::t('yii', 'Is Index'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(InstrumentConfig::className(), ['type' => 'type', 'account' => 'account']);
    }
}
