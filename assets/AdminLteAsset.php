<?php
namespace sky\adminlte\assets;

class AdminLteAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    
    public $css = [
        'dist/css/adminlte.min.css',
        'plugins/fontawesome-free/css/all.min.css',
        'plugins/chart.js/Chart.min.css'
    ];
    
    public $js = [
        'dist/js/adminlte.min.js',
        'plugins/fastclick/fastclick.js',
        'plugins/chart.js/Chart.min.js'
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap4\BootstrapAsset'
    ];
    
    public $publishOptions = [
        'only' => [
            'dist/css/*',
            'dist/js/*',
            'plugins/fontawesome-free/css/*',
            'plugins/fontawesome-free/webfonts/*',
            'plugins/chart.js/*',
            'plugins/fastclick/*'
        ]
    ];
}