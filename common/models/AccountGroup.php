<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%account_group}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property integer $status
 *
 * @property Account[] $accounts
 * @property GroupHasPermission[] $groupHasPermissions
 * @property Permission[] $permissions
 */
class AccountGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%account_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'name' => Yii::t('yii', 'Name'),
            'desc' => Yii::t('yii', 'Desc'),
            'status' => Yii::t('yii', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::className(), ['group' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupHasPermissions()
    {
        return $this->hasMany(GroupHasPermission::className(), ['group' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermissions()
    {
        return $this->hasMany(Permission::className(), ['id' => 'permission'])->viaTable('{{%group_has_permission}}', ['group' => 'id']);
    }
}
