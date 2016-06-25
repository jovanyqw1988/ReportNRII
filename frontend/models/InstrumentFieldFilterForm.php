<?php
namespace frontend\models;

use common\models\InstrumentConfig;use common\models\RemoteField;use Yii;use yii\base\Model;

class InstrumentFieldFilterForm extends Model
{
    public $user;
    public $innerId;
    public $canme;
    public $ename;
    public $instrBelongsType;
    public $InstrBelongsName;
    public $instrCategory;
    public $instrSource;
    public $instrSupervise;
    public $level;
    public $url;
    public $worth;
    public $establish;
    public $nation;
    public $manufacturer;
    public $beginDate;
    public $type;
    public $instrVersion;
    public $technical;
    public $function;
    public $subject;
    public $serviceContent;
    public $achievement;
    public $status;
    public $requirement;
    public $fee;
    public $serviceUrl;
    public $province;
    public $city;
    public $county;
    public $street;
    public $contact;
    public $phone;
    public $email;
    public $address;
    public $postalcode;
    public $shareMode;
    public $image;
    public $auditStatus;

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

    public function save_mapping($id)
    {
        $insConfig = InstrumentConfig::findOne(['account' => Yii::$app->user->id, 'type' => $id]);
        if (empty($insConfig)) {
            $insConfig = new InstrumentConfig();
            $insConfig->type = $id;
            $insConfig->account = Yii::$app->user->id;
            $insConfig->insert();
        }
        foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
            if (!in_array($id, $opt['support'])) {
                continue;
            }
            $remoteField = RemoteField::findOne(['account' => Yii::$app->user->id, 'type' => $id, 'field' => $field]);
            if (empty($remoteField)) {
                $remoteField = new RemoteField();
                $remoteField->account = Yii::$app->user->id;
                $remoteField->type = $id;
                $remoteField->field = $field;
                $remoteField->remote_field = $this->$field;
                $remoteField->insert();
            } else {
                $remoteField->remote_field = $this->$field;
                $remoteField->update();
            }
        }

    }

    public function fetch_mapping($id)
    {
        foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
            if (!in_array($id, $opt['support'])) {
                continue;
            }
            $remoteField = RemoteField::findOne(['account' => Yii::$app->user->id, 'type' => $id, 'field' => $field]);
            $this->$field = $remoteField ? $remoteField->remote_field : null;
        }
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function save_filter($id)
    {
        $insConfig = InstrumentConfig::findOne(['account' => Yii::$app->user->id, 'type' => $id]);
        if (empty($insConfig)) {
            $insConfig = new InstrumentConfig();
            $insConfig->type = $id;
            $insConfig->account = Yii::$app->user->id;
            $insConfig->insert();
        }
        foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
            if (!in_array($id, $opt['support'])) {
                continue;
            }
            if ($this->$field) {
                $remoteField = RemoteField::findOne(['account' => Yii::$app->user->id, 'type' => $id, 'field' => $field]);
                if (empty($remoteField)) {
                    $remoteField = new RemoteField();
                    $remoteField->account = Yii::$app->user->id;
                    $remoteField->type = $id;
                    $remoteField->field = $field;
                    $remoteField->insert();
                }
            } else {
                $remoteField = RemoteField::findOne(['account' => Yii::$app->user->id, 'type' => $id, 'field' => $field]);
                $remoteField && $remoteField->delete();
            }
        }
    }

    /**
     * @param $id
     */
    public function fetch_filter($id)
    {
        foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
            if (!in_array($id, $opt['support'])) {
                continue;
            }
            $remoteField = RemoteField::findOne(['account' => Yii::$app->user->id, 'type' => $id, 'field' => $field]);
            if(isset($opt['required']) && $opt['required']){
                if(empty($remoteField)){
                    $remoteField = new RemoteField();
                    $remoteField->account = Yii::$app->user->id;
                    $remoteField->type = $id;
                    $remoteField->field = $field;
                    $remoteField->insert();
                }
                $this->$field = true;
            }else{
                $this->$field = !empty($remoteField);
            }
        }
    }

    public function fetch_fields($id)
    {
        $fields = [];
        foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
            if (!in_array($id, $opt['support'])) {
                continue;
            }
            $remoteField = RemoteField::findOne(['account' => Yii::$app->user->id, 'type' => $id, 'field' => $field]);
            $remoteField && array_push($fields, $field);
        }
        return $fields;
    }

}