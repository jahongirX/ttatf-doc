<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{    
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css",
        "https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css",
        "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css",
        "css/adminlte.css",
        'css/custom.css'
    ];

    public $js = [
        "https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js",
        "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js",
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js",
        "js/adminlte.js",
        "js/custom.js"
    ];

      public $depends = [
//          'yii\web\yiiAsset',
          'yii\web\JqueryAsset'
      ];

}
