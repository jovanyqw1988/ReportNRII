<?php
use yii\helpers\Url;

$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', '上报数据'), 'url' => ['index', 'id' => $id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', Yii::$app->params['Data_Type'][$id])];
$this->beginBlock('content-header');
?>
    <h1><?= Yii::t('yii', Yii::$app->params['Data_Type'][$id]) ?>
        <small><?= Yii::t('yii', '上报数据') ?></small>
    </h1>
<?php $this->endBlock(); ?>


    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><?= Yii::t('yii', Yii::$app->params['Data_Type'][$id]) ?>
                -<?= Yii::t('yii', '上报数据') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <?php
                    if (in_array($id, ['1', '2', '3', '4'])) {
                        foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
                            if (!isset($opt['columns']) || !in_array($id, $opt['columns'])) {
                                continue;
                            }
                            ?>
                            <th><?= isset($opt['label']) ? $opt['label'] : $field ?></th>
                        <?php }
                    } else if (in_array($id, ['5'])) {
                        foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                            if (empty($opt['column'])) {
                                continue;
                            }
                            ?>
                            <th><?= isset($opt['label']) ? $opt['label'] : $field ?></th>
                        <?php }
                    } else if (in_array($id, ['6'])) {
                        foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                            if (empty($opt['column'])) {
                                continue;
                            }
                            ?>
                            <th><?= isset($opt['label']) ? $opt['label'] : $field ?></th>
                        <?php }
                    } else if (in_array($id, ['7'])) {
                        foreach (Yii::$app->params['Service_Effect'] as $field => $opt) {
                            if (empty($opt['column'])) {
                                continue;
                            }
                            ?>
                            <th><?= isset($opt['label']) ? $opt['label'] : $field ?></th>
                        <?php }
                    } ?>
                    <th width="80px">状态</th>
                    <th width="80px">操作</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($models as $model) { ?>
                    <tr>
                        <?php
                        if (in_array($id, ['1', '2', '3', '4'])) {
                            foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
                                if (!isset($opt['columns']) || !in_array($id, $opt['columns'])) {
                                    continue;
                                }
                                ?>
                                <td><?= isset($model[$field]) ? $model[$field] : "" ?></td>
                            <?php }
                        } else if (in_array($id, ['5'])) {
                            foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                                if (empty($opt['column'])) {
                                    continue;
                                }
                                ?>
                                <td><?= isset($model[$field]) ? $model[$field] : "" ?></td>
                            <?php }
                        } else if (in_array($id, ['6'])) {
                            foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                                if (empty($opt['column'])) {
                                    continue;
                                }
                                ?>
                                <td><?= isset($model[$field]) ? $model[$field] : "" ?></td>
                            <?php }
                        } else if (in_array($id, ['7'])) {
                            foreach (Yii::$app->params['Service_Effect'] as $field => $opt) {
                                if (empty($opt['column'])) {
                                    continue;
                                }
                                ?>
                                <td><?= isset($model[$field]) ? $model[$field] : "" ?></td>
                            <?php }
                        } ?>
                        <td>
                            <a href="<?= Url::to(['index', 'id' => $id, 'innerId' => $model['innerId']]) ?>"
                               class="btn">
                                <?= $model['result'] ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?= Url::to(['index', 'id' => $id, 'innerId' => $model['innerId']]) ?>"
                               class="btn btn-app">
                                <i class="fa fa-edit"></i> 上报
                            </a>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                    <?php
                    if (in_array($id, ['1', '2', '3', '4'])) {
                        foreach (Yii::$app->params['Instrument_Fields'] as $field => $opt) {
                            if (!isset($opt['columns']) || !in_array($id, $opt['columns'])) {
                                continue;
                            }
                            ?>
                            <th><?= isset($opt['label']) ? $opt['label'] : $field ?></th>
                        <?php }
                    } else if (in_array($id, ['5'])) {
                        foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                            if (empty($opt['column'])) {
                                continue;
                            }
                            ?>
                            <th><?= isset($opt['label']) ? $opt['label'] : $field ?></th>
                        <?php }
                    } else if (in_array($id, ['6'])) {
                        foreach (Yii::$app->params['Service_Record'] as $field => $opt) {
                            if (empty($opt['column'])) {
                                continue;
                            }
                            ?>
                            <th><?= isset($opt['label']) ? $opt['label'] : $field ?></th>
                        <?php }
                    } else if (in_array($id, ['7'])) {
                        foreach (Yii::$app->params['Service_Effect'] as $field => $opt) {
                            if (empty($opt['column'])) {
                                continue;
                            }
                            ?>
                            <th><?= isset($opt['label']) ? $opt['label'] : $field ?></th>
                        <?php }
                    } ?>
                    <th width="80px">状态</th>
                    <th>操作</th>
                </tr>
                </tfoot>
            </table>
        </div>

        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
<?php
$this->registerJs('
$(document).ready(function(){ 
    $("table").DataTable();  
});
', \yii\web\View::POS_END);
?>