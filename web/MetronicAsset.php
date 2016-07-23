<?php

namespace d4rkstar\web;

use yii;
use yii\web\AssetBundle;

class MetronicAsset extends AssetBundle
{

    public $sourcePath = '@webroot/metronic';

    public $layout = 'global';

    public $skin = '';

    public $addons = [];

    public $css = [ ];
    public $js = [ ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];



    /**
     * @inheritdoc
     */
    public function init()
    {

        parent::init();

    }
}