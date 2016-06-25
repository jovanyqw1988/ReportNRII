<?php
namespace dmstr\web;

use yii\base\Exception;use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class AdminLteAsset extends BaseAdminLteAsset
{

    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    public $css = [
        'plugins/iCheck/all.css',
        'plugins/colorpicker/bootstrap-colorpicker.min.css',
        'plugins/datatables/dataTables.bootstrap.css',
        'plugins/select2/select2.min.css',
        'dist/css/AdminLTE.min.css',
    ];
    public $js = [
        'plugins/iCheck/icheck.min.js',
        'plugins/datepicker/bootstrap-datepicker.js',
        'plugins/select2/select2.full.min.js',
        'plugins/input-mask/jquery.inputmask.js',
        'plugins/input-mask/jquery.inputmask.extensions.js',
        'plugins/datatables/jquery.dataTables.min.js',
        'plugins/datatables/dataTables.bootstrap.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'dist/js/app.min.js',
    ];
    public $depends = [
        'rmrevin\yii\fontawesome\AssetBundle',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    /**
     * @var string|bool Choose skin color, eg. `'skin-blue'` or set `false` to disable skin loading
     * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
     */
    public $skin = '_all-skins';

    /**
     * @inheritdoc
     */
    public function init()
    {
        // Append skin color file if specified
        if ($this->skin) {
            if (('_all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }

            $this->css[] = sprintf('dist/css/skins/%s.min.css', $this->skin);
        }

        parent::init();
    }
}
