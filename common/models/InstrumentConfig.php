<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%instrument_config}}".
 *
 * @property integer $type
 * @property string $account
 * @property string $sql
 * @property string $sql_fields
 * @property string $sql_pages
 *
 * @property Account $account0
 * @property RemoteField[] $remoteFields
 */
class InstrumentConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%instrument_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'account'], 'required'],
            [['type'], 'integer'],
            [['sql', 'sql_fields'], 'string'],
            [['account'], 'string', 'max' => 20],
            [['sql_pages'], 'string', 'max' => 45],
            [['account'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account' => 'account']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type' => Yii::t('yii', 'Type'),
            'account' => Yii::t('yii', 'Account'),
            'sql' => Yii::t('yii', 'Sql'),
            'sql_fields' => Yii::t('yii', 'Sql Fields'),
            'sql_pages' => Yii::t('yii', 'Sql Pages'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount0()
    {
        return $this->hasOne(Account::className(), ['account' => 'account']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRemoteFields()
    {
        return $this->hasMany(RemoteField::className(), ['type' => 'type', 'account' => 'account']);
    }

    public function sqlCountAll()
    {
        return strtr($this->sql, [':fields' => 'COUNT(*) as ' . $this->total(), ':pages' => ""]);
    }

    public function total()
    {
        return "total";
    }


    public function sqlFindAll()
    {
        return strtr($this->sql, [':fields' => $this->sql_fields, ':pages' => ""]);
    }

    public function sqlFindPages($start, $limit)
    {
        return strtr($this->sql, [':fields' => $this->sql_fields, ':pages' => strtr($this->sql_pages, [':start' => $start, ':limit' => $limit])]);
    }
    public function sqlFindPagesTotal($start, $limit)
    {
        return strtr($this->sql, [':fields' => 'COUNT(*) as ' . $this->total(), ':pages' => strtr($this->sql_pages, [':start' => $start, ':limit' => $limit])]);
    }


}
