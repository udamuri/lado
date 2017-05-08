<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/kilo/font-awesome/css/font-awesome.min.css',
        'css/kilo/bootstrap-flat/css/bootstrap-flat.min.css',
        'css/kilo/main.css',
        'css/kilo/navbar.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
