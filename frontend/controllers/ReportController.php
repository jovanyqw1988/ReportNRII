<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/20
 * Time: 14:42
 */
namespace frontend\controllers;

use common\helper\Report;
use common\models\Account;
use common\models\Instrument;
use common\models\RemoteField;
use common\models\ServiceEffect;
use common\models\ServiceRecord;
use Yii;
use yii\web\Controller;

/**
 * 所有的上报功能都在这里进行
 */
class ReportController extends Controller
{

    /**
     * 配置总览
     *
     * @param $id
     * @param int $innerId
     * @return mixed
     */
    public function actionIndex($id = 1, $innerId = null)
    {
        if ($user = Account::findOne(['account' => Yii::$app->user->id])) {
            if ($innerId) {
                $item = $user->getQueryOne($id, $innerId);
                if ($item) {
                    $remote_mappings = RemoteField::findAll(['account' => Yii::$app->user->id, "type" => $id]);
                    $instr = [];
                    foreach ($item as $remote_field => $value) {
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

                    if (in_array($id, ['1', '2', '3', '4'])) {
                        $instrument = Instrument::findOne(['account' => Yii::$app->user->id, 'innerId' => $instr['innerId']]);
                        $instr['result'] = empty($instrument) ? null : $instrument->result;
                    } else if (in_array($id, ['5'])) {
                        $ServiceRecord = ServiceRecord::findOne(['account' => Yii::$app->user->id, 'innerId' => $instr['innerId']]);
                        $instr['result'] = empty($ServiceRecord) ? null : $ServiceRecord->result;
                    } else if (in_array($id, ['6'])) {
                        $ServiceRecord = ServiceRecord::findOne(['account' => Yii::$app->user->id, 'innerId' => $instr['innerId']]);
                        $instr['result'] = empty($ServiceRecord) ? null : $ServiceRecord->result;
                    } else if (in_array($id, ['7'])) {
                        $ServiceEffect = ServiceEffect::findOne(['account' => Yii::$app->user->id, 'innerId' => $instr['innerId']]);
                        $instr['result'] = empty($ServiceEffect) ? null : $ServiceEffect->result;
                    }

                    return $this->render('show', [
                        'id' => $id,
                        'result' => $instr,
                        'message' => '查询成功！',
                    ]);
                }
            } else {
                //获取字段映射表
                $remote_mappings = RemoteField::findAll(['account' => Yii::$app->user->id, "type" => $id]);
                //读取关键字段映射
                $remote_field_innerId = RemoteField::findOne(['account' => Yii::$app->user->id, "type" => $id, 'field' => 'innerId']);
                //查询远程数据
                $remote_values = [];
                //$total = $user->getQueryAllCount($id);
                $query = $user->getQueryAll($id);
                if ($query && $remote_field_innerId && $remote_field_innerId['remote_field']) {
                    foreach ($query as $item) {
                        $instr = [];
                        foreach ($item as $remote_field => $value) {
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

                        if (in_array($id, ['1', '2', '3', '4'])) {
                            $instrument = Instrument::findOne(['account' => Yii::$app->user->id, 'innerId' => $instr['innerId']]);
                            $instr['result'] = empty($instrument) ? null : $instrument->result;
                        } else if (in_array($id, ['5'])) {
                            $ServiceRecord = ServiceRecord::findOne(['account' => Yii::$app->user->id, 'innerId' => $instr['innerId']]);
                            $instr['result'] = empty($ServiceRecord) ? null : $ServiceRecord->result;
                        } else if (in_array($id, ['6'])) {
                            $ServiceRecord = ServiceRecord::findOne(['account' => Yii::$app->user->id, 'innerId' => $instr['innerId']]);
                            $instr['result'] = empty($ServiceRecord) ? null : $ServiceRecord->result;
                        } else if (in_array($id, ['7'])) {
                            $ServiceEffect = ServiceEffect::findOne(['account' => Yii::$app->user->id, 'innerId' => $instr['innerId']]);
                            $instr['result'] = empty($ServiceEffect) ? null : $ServiceEffect->result;
                        }
                        array_push($remote_values, $instr);
                    }
                }
                return $this->render('index', [
                    'id' => $id,
                    'models' => $remote_values,
                ]);
            }
        } else {
            return $this->render('index', [
                'id' => $id,
                'models' => [],
            ]);
        }
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

    public function actionReport($id = 1)
    {
        $user = Account::findOne(['account' => Yii::$app->user->id]);
        if (empty($user)) {
            return "Please login!";
        }
        $report = new Report();
        $report->insCode = $user->ins_code;
        $report->setInstruType($id);
        $item = Yii::$app->request->post();
        unset($item['_csrf']);
        unset($item['submit']);
        $report->addReportData($item);
        $result = '';
        switch (intval($id)) {
            case 1:
            case 2:
            case 3:
            case 4:
                $result = $report->instrument();
                $instrument = Instrument::findOne(['account' => Yii::$app->user->id, 'innerId' => $item['innerId']]);
                if (empty($instrument)) {
                    $instrument = new Instrument();
                    $instrument->account = Yii::$app->user->id;
                    $instrument->innerId = $item['innerId'];
                    $instrument->instrument = intval($id);
                    $instrument->result = intval($result);
                    $instrument->insert();
                } else {
                    $instrument->result = intval($result);
                    $instrument->update();
                }
                break;
            case 5:
                $result = $report->instrument();
                $ServiceRecord = ServiceRecord::findOne(['account' => Yii::$app->user->id, 'innerId' => $item['innerId']]);
                if (empty($ServiceRecord)) {
                    $ServiceRecord = new ServiceRecord();
                    $ServiceRecord->account = Yii::$app->user->id;
                    $ServiceRecord->innerId = $item['innerId'];
                    $ServiceRecord->result = intval($result);
                    $ServiceRecord->insert();
                } else {
                    $ServiceRecord->result = intval($result);
                    $ServiceRecord->update();
                }
                break;
            case 6:
                $result = $report->instrument();
                $ServiceRecord = ServiceRecord::findOne(['account' => Yii::$app->user->id, 'innerId' => $item['innerId']]);
                if (empty($ServiceRecord)) {
                    $ServiceRecord = new ServiceRecord();
                    $ServiceRecord->account = Yii::$app->user->id;
                    $ServiceRecord->innerId = $item['innerId'];
                    $ServiceRecord->result = intval($result);
                    $ServiceRecord->insert();
                } else {
                    $ServiceRecord->result = intval($result);
                    $ServiceRecord->update();
                }
                break;
            case 7:
                $result = $report->serviceEffect();
                $se = ServiceEffect::findOne(['account' => Yii::$app->user->id]);
                if ($se) {
                    $se->result = $result;
                    $se->update();
                } else {
                    $se = new ServiceEffect();
                    $se->account = Yii::$app->user->id;
                    $se->result = $result;
                    $se->insert();
                }
                break;
        }

        return $this->redirect(['report/index', 'id' => $id, 'innerId' => $item['innerId']]);
    }

}
