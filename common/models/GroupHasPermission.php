<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%group_has_permission}}".
 *
 * @property integer $group
 * @property integer $permission
 *
 * @property AccountGroup $group0
 * @property Permission $permission0
 */
class GroupHasPermission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%group_has_permission}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group', 'permission'], 'required'],
            [['group', 'permission'], 'integer'],
            [['group'], 'exist', 'skipOnError' => true, 'targetClass' => AccountGroup::className(), 'targetAttribute' => ['group' => 'id']],
            [['permission'], 'exist', 'skipOnError' => true, 'targetClass' => Permission::className(), 'targetAttribute' => ['permission' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group' => Yii::t('yii', 'Group'),
            'permission' => Yii::t('yii', 'Permission'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup0()
    {
        return $this->hasOne(AccountGroup::className(), ['id' => 'group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermission0()
    {
        return $this->hasOne(Permission::className(), ['id' => 'permission']);
    }
}
