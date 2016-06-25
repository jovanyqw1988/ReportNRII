<?php
namespace frontend\models;

use common\models\Account;use common\models\AccountHasInscode;use Yii;use yii\base\Model;

class SystemParamForm extends Model
{
    public $insCode;
    public $client_id;
    public $client_secret;
    public $redirect_uri;
    public $state;

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

        ];
    }


    /**
     * Signs frontend up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function save()
    {
        $user = Account::findOne(['account' => Yii::$app->user->id]);
        if ($user) {
            $user->ins_code = $this->insCode;
            $user->client_id = $this->client_id;
            $user->client_secret = $this->client_secret;
            $user->redirect_uri = $this->redirect_uri;
            $user->state = $this->state;
            $user->update();
        } else {
            $this->addError($this->className(), 'error!');
        }
    }


    public function fetch()
    {
        $user = Account::findOne(["account" => Yii::$app->user->id]);
        if ($user) {
            $this->insCode = $user->ins_code;
            $this->client_id = $user->client_id;
            $this->client_secret = $user->client_secret;
            $this->redirect_uri = $user->redirect_uri;
            $this->state = $user->state;
        } else {
            $this->addError($this->className(), 'error!');
        }
    }

    public function test()
    {
        $user = Account::findOne(["account" => Yii::$app->user->id]);
        if ($user) {
            $user->ins_code = $this->insCode;
            $user->client_id = $this->client_id;
            $user->client_secret = $this->client_secret;
            $user->redirect_uri = $this->redirect_uri;
            $user->state = $this->state;
            return $user->testDBConnection();
        } else {
            $this->addError($this->className(), 'error!');
        }

    }


}