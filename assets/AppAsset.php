<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/jquery.timepicker.min.css',
        'css/jquery.css',
        'css/jquery-ui.min.css',
        'css/jquery-ui.theme.min.css',
        'css/slick-theme.css',
        'css/slick.css',
        'css/jcarousel.ajax.css',
        'css/site.css',
    ];
    public $js = [
       // 'js/bootstrap-datepicker.min.js',
        'js/datepicker.js',
        'js/jquery-ui.min.js',
        'js/jquery.timepicker.min.js',
        'js/slick.min.js',
        'js/jquery.jcarousel.min.js',
        'js/jcarousel.ajax.js',
        'js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
