<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        // "web/public/css/bootstrap.css",
        // "web/public/css/font-awesome.min.css",
        // "web/public/css/animate.min.css",
        // "web/public/css/owl.carousel.css",
        // "web/public/css/owl.theme.css",
        // "web/public/css/owl.transitions.css",
        // "web/public/css/style.css",
        // "web/public/css/responsive.css",
        // "web/public/css/style_side.css",

        "public/css/bootstrap.css",
        "public/css/font-awesome.min.css",
        "public/css/animate.min.css",
        "public/css/owl.carousel.css",
        "public/css/owl.theme.css",
        "public/css/owl.transitions.css",
        "public/css/style.css",
        "public/css/responsive.css",
        "public/css/style_side.css",

        
    ];
    public $js = [
        //        "public/js/jquery-1.11.3.min.js",

        // "web/public/js/owl.carousel.min.js",
        // "web/public/js/jquery.stickit.min.js",
        // "web/public/js/menu.js",
        // "web/public/js/scripts.js",
        // "web/public/js/bootstrap.js",

        "public/js/owl.carousel.min.js",
        "public/js/jquery.stickit.min.js",
        "public/js/menu.js",
        "public/js/scripts.js",
        "public/js/bootstrap.js",
    ];
    public $depends = [];

    public function init()
    {
        parent::init();

        // Додаємо мітку часу або іншу версію до всіх ресурсів
        $this->css = array_map(function ($file) {
            return $file . '?v=' . filemtime(\Yii::getAlias('@webroot') . '/' . $file);
        }, $this->css);

        $this->js = array_map(function ($file) {
            return $file . '?v=' . filemtime(\Yii::getAlias('@webroot') . '/' . $file);
        }, $this->js);
    }
}
