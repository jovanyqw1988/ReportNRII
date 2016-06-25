<?php
namespace frontend\models;

use common\models\Account;use Yii;use yii\base\Model;

class DatabaseForm extends Model
{
    public $type = 'MySQL';
    public $host;
    public $port = 3306;
    public $name;
    public $charset = 'utf8';
    public $user;
    public $password;

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
        $user = Account::findOne(["account" => Yii::$app->user->id]);
        if ($user) {
            $user->db_type = $this->type;
            $user->db_host = $this->host;
            $user->db_port = $this->port;
            $user->db_name = $this->name;
            $user->db_charset = $this->charset;
            $user->db_user = $this->user;
            $user->db_password = $this->password;
            return $user->update() ? $user : null;
        } else {
            $this->addError($this->className(), 'error!');
        }
    }

    public function fetch()
    {
        $user = Account::findOne(["account" => Yii::$app->user->id]);
        if ($user) {
            $this->type = $user->db_type;
            $this->host = $user->db_host;
            $this->port = $user->db_port;
            $this->name = $user->db_name;
            $this->charset = $user->db_charset;
            $this->user = $user->db_user;
            $this->password = $user->db_password;
        } else {
            $this->addError($this->className(), 'error!');
        }
    }

    public function test()
    {
        $user = Account::findOne(["account" => Yii::$app->user->id]);
        if ($user) {
            $user->db_type = $this->type;
            $user->db_host = $this->host;
            $user->db_port = $this->port;
            $user->db_name = $this->name;
            $user->db_charset = $this->charset;
            $user->db_user = $this->user;
            $user->db_password = $this->password;
            return $user->testDBConnection();
        } else {
            $this->addError($this->className(), 'error!');
        }

    }


}