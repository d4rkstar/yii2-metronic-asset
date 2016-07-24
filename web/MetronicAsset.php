<?php

namespace d4rkstar\web;

use yii;
use yii\web\AssetBundle;

class MetronicAsset extends AssetBundle
{

    public $sourcePath = '@webroot/metronic';

    public $layout = 'layout';

    public $theme = 'default';

    public $addons = [];

    public $css = [
        'assets/global/plugins/font-awesome/css/font-awesome.min.css',
        'assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
        'assets/global/plugins/bootstrap/css/bootstrap.min.css',
        'assets/global/plugins/uniform/css/uniform.default.css',
        'assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

        'assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
        'assets/global/plugins/fullcalendar/fullcalendar.min.css',
        'assets/global/plugins/jqvmap/jqvmap/jqvmap.css',
        'assets/global/plugins/morris/morris.css',

        'assets/global/css/components-md.css',
        'assets/global/css/plugins-md.css',
        'assets/admin/[layout]/css/layout.css',
        'assets/admin/[layout]/css/themes/[theme].css',
        'assets/admin/[layout]/css/custom.css'

    ];
    public $js = [
        'assets/global/plugins/respond.min.js',
        'assets/global/plugins/excanvas.min.js',
        'assets/global/plugins/jquery-migrate.min.js',
        'assets/global/plugins/jquery-ui/jquery-ui.min.js',
        'assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
        'assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'assets/global/plugins/jquery.blockui.min.js',
        'assets/global/plugins/jquery.cokie.min.js',
        'assets/global/plugins/uniform/jquery.uniform.min.js',
        'assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        'assets/global/scripts/metronic.js',
        'assets/admin/[layout]/scripts/layout.js',
        'assets/admin/[layout]/scripts/demo.js',

    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];



    /**
     * @inheritdoc
     */
    public function init()
    {
        $themes = [
            'blue','dark','default','grey','light'
        ];
        if (!in_array($this->theme, $themes))
            throw new yii\base\Exception("Theme {$this->theme} is not supported");

        parent::init();

        $controller = Yii::$app->controller->id .'/'. Yii::$app->controller->action->id;
        if (array_key_exists($controller, $this->addons)) {
            $additional = $this->addons[$controller];
            if (array_key_exists('js',$additional) && is_array($additional['js'])) {
                $this->js = array_merge($this->js, $additional['js']);
            }
            if (array_key_exists('css',$additional) && is_array($additional['css'])) {
                $this->css = array_merge($this->css, $additional['css']);
            }
        }

        // preprocess CSS
        foreach($this->css as $k=>$v) {
            $v = str_replace('[layout]',$this->layout,$v);
            $v = str_replace('[theme]',$this->theme,$v);
            $this->css[$k] = $v;
        }
        // preprocess JS
        foreach($this->js as $k=>$v) {
            $v = str_replace('[layout]',$this->layout,$v);
            $v = str_replace('[theme]',$this->theme,$v);
            $this->js[$k] = $v;
        }


    }
}