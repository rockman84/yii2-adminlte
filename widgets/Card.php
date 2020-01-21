<?php
namespace sky\adminlte\widgets;

use yii\helpers\Html;

class Card extends \yii\base\Widget
{
    public $title;
    
    public $headerOptions = [];
    
    public $body;
    
    public $bodyOptions = [];
    
    public $footer;
    
    public $footerOptions = [];
    
    public $options = [];
    
    public $refresh = false;
    
    public $refreshData = [
        'source' => '#',
        'selector' => 'body',
    ];
    
    public $closeable = false;
    
    public $collapse = true;
    
    public $maximize = true;
    
    public function run() {
        Html::addCssClass($this->options, 'card');
        return Html::tag('div', $this->header() . $this->body() . $this->footer(), $this->options);
    }
    
    public function body()
    {
        Html::addCssClass($this->bodyOptions, 'card-body');
        return Html::tag('div', $this->body, $this->bodyOptions);
    }
    
    public function footer()
    {
        if (!$this->footer) {
            return false;
        }
        Html::addCssClass($this->footerOptions, 'card-footer');
        return Html::tag('div', $this->footer, $this->footerOptions);
    }
    
    
    public function header()
    {
        Html::addCssClass($this->headerOptions, 'card-header');
        $content = Html::tag('h3', $this->title, ['class' => 'card-title']);
        $buttons = Html::tag('div', $this->collapse() . $this->maximize() . $this->closeable(), ['class' => 'card-tools']);
        return Html::tag('div', $content . $buttons, $this->headerOptions);
    }
    
    public function maximize()
    {
        return $this->maximize ? '<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>' : '';
    }
    
    public function closeable()
    {
        return $this->closeable ? '<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>' : '';
    }
    
    public function collapse()
    {
        return $this->collapse ? '<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>' : '';
    }
    
    public function refresh()
    {
        return Html::button('<i class="fas fa-sync-alt"></i>', [
            'class' => 'btn btn-tool',
            'data' => array_merge(['card-widget' => 'card-refresh'], $this->refreshData),
        ]);
    }
}