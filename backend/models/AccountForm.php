<?php
namespace backend\models;

use common\models\Account;use Yii;use yii\base\Model;

class AccountForm extends Model
{

    public $account;
    public $password;
    public $pf_name;
    public $pf_desc;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'account' => Yii::t('yii', '账号'),
            'password' => Yii::t('yii', '密码'),
            'pf_name' => Yii::t('yii', '平台'),
            'pf_desc' => Yii::t('yii', '简介'),
        ];
    }

    /**
     * Signs frontend up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function create()
    {
//        if (!$this->validate()) {
//            return null;
//        }


        $user = new Account();
        $user->account = $this->account;
        $user->pf_name = $this->pf_name;
        $user->pf_desc = $this->pf_desc;
        $user->setPassword($this->password);
        $user->generateAuthKey();

//        return $frontend;
        return $user->save() ? $user : null;
    }


}