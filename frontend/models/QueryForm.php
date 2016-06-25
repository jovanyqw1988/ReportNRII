<?php
namespace frontend\models;

use common\models\Account;use Yii;use yii\base\Model;

class QueryForm extends Model
{
    public $start;
    public $limit;

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

    public function query($id, $index = 0)
    {
        $user = Account::findOne(['account' => Yii::$app->user->id]);
        if ($user) {
            return $user->testQuery($id, $this->start, $this->limit, $index);
        }
    }


}