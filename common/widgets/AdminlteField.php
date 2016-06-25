<?php

namespace common\widgets;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/23
 * Time: 13:25
 */

class AdminlteField extends \yii\widgets\ActiveField
{


    /**
     * @inheritdoc
     */
    public function radioList($items, $options = [])
    {
        $itemOptions = isset($options['itemOptions']) ? $options['itemOptions'] : [];
        $options['item'] = function ($index, $label, $name, $checked, $value) use ($itemOptions) {
            $options = array_merge(['label' => $label, 'value' => $value], $itemOptions[$index]);
            return '<div class="radio">' . Html::radio($name, $checked, $options) . '</div>';
        };
        parent::radioList($items, $options);
        return $this;
    }
}