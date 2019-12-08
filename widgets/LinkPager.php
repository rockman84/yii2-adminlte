<?php
namespace sky\adminlte\widgets;

class LinkPager extends \yii\widgets\LinkPager
{
    public $linkOptions = [
        'class' => 'page-link'
    ];
    
    public $linkContainerOptions = [
        'class' => 'page-item'
    ];
    
    public $options = [
        'class' => 'pagination pagination-circle'
    ];
    
    public $disabledListItemSubTagOptions = ['tag' => 'div', 'class' => 'page-link'];
}
