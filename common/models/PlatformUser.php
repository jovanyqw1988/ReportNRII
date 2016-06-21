<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%platform_user}}".
 *
 * @property integer $platform_id
 * @property string $platform_username
 * @property string $platform_email
 * @property integer $user_id
 */
class PlatformUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%platform_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['platform_username', 'platform_email', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['platform_username', 'platform_email'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'platform_id' => 'Platform ID',
            'platform_username' => 'Platform Username',
            'platform_email' => 'Platform Email',
            'user_id' => 'User ID',
        ];
    }

    /*
     * $parames $username string username
     * $parames $email  string email
     * return platformuser info
     */
    public function isPlatformUser($username, $email)
    {
        $platform = new \common\models\PlatformUser();
        $row = $platform->findOne(['platform_username' => $username, 'platform_email' => $email]);
        return $row;
    }

}
