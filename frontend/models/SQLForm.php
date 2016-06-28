<?php
namespace frontend\models;

use common\models\Account;use common\models\InstrumentConfig;use Yii;use yii\base\Model;

class SQLForm extends Model
{
    public $sql = 'MySQL';
    public $sql_fields;
    public $sql_pages;

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
     * @param $id
     * @return User|null the saved model or null if saving fails
     * @throws \Exception
     */
    public function save($id)
    {
        $insConfig = InstrumentConfig::findOne(['account' => Yii::$app->user->id, 'type' => $id]);
        if (empty($insConfig)) {
            $insConfig = new InstrumentConfig();
            $insConfig->type = $id;
            $insConfig->account = Yii::$app->user->id;
            $insConfig->sql = $this->sql;
            $insConfig->sql_fields = $this->sql_fields;
            $insConfig->sql_pages = $this->sql_pages;
            $insConfig->insert();
        } else {
            $insConfig->sql = $this->sql;
            $insConfig->sql_fields = $this->sql_fields;
            $insConfig->sql_pages = $this->sql_pages;
            $insConfig->update();
        }
    }

    public function fetch($id)
    {
        $insConfig = InstrumentConfig::findOne(['account' => Yii::$app->user->id, 'type' => $id]);
        if ($insConfig) {
            $this->sql = $insConfig->sql;
            $this->sql_fields = $insConfig->sql_fields;
            $this->sql_pages = $insConfig->sql_pages;
        } else {
            $this->addError($this->className(), 'error!');
        }
    }

    public function test($id)
    {
        $insConfig = InstrumentConfig::findOne(['account' => Yii::$app->user->id, 'type' => $id]);
        if (empty($insConfig)) {
            $insConfig = new InstrumentConfig();
            $insConfig->type = $id;
            $insConfig->account = Yii::$app->user->id;
            $insConfig->sql = $this->sql;
            $insConfig->sql_fields = $this->sql_fields;
            $insConfig->sql_pages = $this->sql_pages;
        } else {
            $insConfig->sql = $this->sql;
            $insConfig->sql_fields = $this->sql_fields;
            $insConfig->sql_pages = $this->sql_pages;
        }
        $user = Account::findOne(['account' => Yii::$app->user->id]);
        if ($user) {
            return $user->testQuery($id, 0, 1);
        }
        return null;;

    }


}