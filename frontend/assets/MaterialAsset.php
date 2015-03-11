<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MaterialAsset extends AssetBundle
{
    public $basePath = '@themes/material';
    public $baseUrl = '../../themes/material';
    public $css = [
        'css/material-wfont.min.css',
        'css/material.min.css',
        'css/ripples.min.css',
        'css/style.css',
    ];
    public $js = [
        'js/material.min.js',
        'js/ripples.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
