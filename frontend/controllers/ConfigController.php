<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/20
 * Time: 14:42
 */
namespace frontend\controllers;

use common\models\Account;
use common\models\RemoteField;
use frontend\models\DatabaseForm;
use frontend\models\InstrumentFieldFilterForm;
use frontend\models\QueryForm;
use frontend\models\SQLForm;
use frontend\models\SystemParamForm;
use Yii;
use yii\web\Controller;

/**
 * 所有的配置都在这里进行
 */
class ConfigController extends Controller
{
    /**
     * 配置总览
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'head' => ''
        ]);
    }

    public function actionDatabase()
    {
        $model = new DatabaseForm();
        $result = "";
        if ($model->load(Yii::$app->request->post())) {
            switch (Yii::$app->request->post("submit")) {
                case "save":
                    $model->save();
                    break;
                case "test":
                    $result = $model->test();
                    break;
            }
            return $this->render('database', [
                'model' => $model,
                'result' => $result,
            ]);
        }
        $model->fetch();
        return $this->render('database', [
            'model' => $model,
            'result' => $result,
        ]);
    }

    public function actionType($id, $step = '1', $index = 0)
    {
        switch ($step) {
            case '1':
                $model = new InstrumentFieldFilterForm();
                if ($model->load(Yii::$app->request->post()) && $model->save_filter($id)) {
                    return $this->render('type-' . $step, [
                        'id' => $id,
                        'step' => $step,
                        'model' => $model,
                    ]);
                }
                $model->fetch_filter($id);
                return $this->render('type-' . $step, [
                    'id' => $id,
                    'step' => $step,
                    'model' => $model,
                ]);
                break;
            case '2':
                $model = new SQLForm();
                $instrument = new InstrumentFieldFilterForm();
                $query = new QueryForm();
                $result = [];
                if (($model->load(Yii::$app->request->post()))) {
                    switch (Yii::$app->request->post("submit")) {
                        case "save":
                            $model->save($id);
                            break;
                        case "test":
                            $result = $model->test($id);
                            break;
                    }
                } else {
                    $model->fetch($id);
                }
                if (($instrument->load(Yii::$app->request->post()))) {
                    $result = $model->test($id);
                    $instrument->save_mapping($id);
                } else {
                    $instrument->fetch_mapping($id);
                }
                if ($query->load(Yii::$app->request->post())) {
                    $result = $query->query($id, $index);
                }
                return $this->render('type-' . $step, [
                    'id' => $id,
                    'step' => $step,
                    'model' => $model,
                    'instrument' => $instrument,
                    'query' => $query,
                    'fields' => $instrument->fetch_fields($id),
                    'result' => $result,
                ]);
                break;
            case '3':
                $user = Account::findOne(['account' => Yii::$app->user->id]);
                if ($user) {
                    $instr = [];
                    //第一步：读取配置文件的数据，略
                    //第二步：读取远程已经配置的数据
                    //获取字段映射表
                    $remote_mappings = RemoteField::findAll(['account' => Yii::$app->user->id, "type" => $id]);
                    //读取关键字段映射
                    $remote_field_innerId = RemoteField::findOne(['account' => Yii::$app->user->id, "type" => $id, 'field' => 'innerId']);
                    //查询远程数据
                    $remote_values = $user->testQueryAll($id, $index);
                    if (empty($remote_values['total']) || empty($remote_field_innerId) || empty($remote_field_innerId['remote_field'])) {
                        return $this->render('type-' . $step, [
                            'id' => $id,
                            'step' => $step,
                            'result' => [],
                            'remote' => null,
                            'message' => "You should fill some required field mapping!"
                        ]);
                    }
                    foreach ($remote_values['data'] as $remote_field => $value) {
                        //var_dump($remote_field,"<hr>");
                        if (in_array($id, ['1', '2', '3', '4'])) {
                            foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
                                if (!in_array($id, $opt['support'])) {
                                    continue;
                                }
                                $this->tmp_foreach_type_3($remote_mappings, $remote_field, $field, $value, $instr);
                            }
                        } else if (in_array($id, ['5'])) {
                            foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                                $this->tmp_foreach_type_3($remote_mappings, $remote_field, $field, $value, $instr);
                            }
                        } else if (in_array($id, ['6'])) {
                            foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                                $this->tmp_foreach_type_3($remote_mappings, $remote_field, $field, $value, $instr);
                            }
                        } else if (in_array($id, ['7'])) {
                            foreach (Yii::$app->params['Service_Effect'] as $field => $opt) {
                                $this->tmp_foreach_type_3($remote_mappings, $remote_field, $field, $value, $instr);
                            }
                        }
                    }

                    /*
                    //第三步：剩下的字段读取本地数据库数据
                    //读取关键字段映射对应的值
                    $remote_value_user = $remote_values['data'][$remote_field_user['remote_field']];
                    $remote_value_innerId = $remote_values['data'][$remote_field_innerId['remote_field']];
                    //查询本地数据库记录
                    $instrument = Instrument::findOne(['account' => Yii::$app->frontend->id, 'innerId' => $remote_field_innerId, "frontend" => $remote_value_user]);
                    foreach ($remote_values['data'] as $remote_field => $value) {
                        foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
                            if (!in_array($id, $opt['support']) && array_key_exists($remote_field, $instr)) {
                                continue;
                            }
                            if ($instrument) {
                                $instr[$field] = $instrument[$field];
                            } else {
                                $instr[$field] = null;
                            }
                        }
                    }*/

                    return $this->render('type-' . $step, [
                        'id' => $id,
                        'step' => $step,
                        'result' => $instr,
                        'remote' => $remote_values,
                        'message' => 'Query Success!'
                    ]);
                } else {

                }
        }
        return $this->render('type-' . $step, ['id' => $id,
            'step' => $step]);
    }

    protected function tmp_foreach_type_3($remote_mappings, $remote_field, $field, $value, &$instr)
    {
        foreach ($remote_mappings as $mapping) {
            if ($mapping['field'] == $field && $mapping['remote_field'] && $mapping['remote_field'] == $remote_field) {
                $instr[$field] = $value;
                break;
            }
        }
    }

    public function actionSystem()
    {
        $model = new SystemParamForm();
        $result = "";
        if ($model->load(Yii::$app->request->post())) {
            switch (Yii::$app->request->post("submit")) {
                case "save":
                    $model->save();
                    break;
                case "test":
                    $result = $model->test();
                    break;
            }
            return $this->render('system', [
                'model' => $model,
                'result' => $result,
            ]);
        }
        $model->fetch();
        return $this->render('system', [
            'model' => $model,
            'result' => $result,
        ]);
    }


}