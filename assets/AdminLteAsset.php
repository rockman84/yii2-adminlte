<?php
namespace sky\adminlte\assets;

class AdminLteAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte';
    
    public $css = [
        'dist/css/adminlte.min.css',
        'plugins/fontawesome-free/css/all.min.css',
    ];
    
    public $js = [
        'dist/js/adminlte.min.js',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap4\BootstrapAsset'
    ];
    
    public $publishOptions = [
        'only' => [
            'dist/*',
            'plugins/*',
        ]
    ];
}