<?php
namespace sky\adminlte\widgets;

use yii\bootstrap4\Html;
use sky\adminlte\widgets\LinkPager;
use yii\helpers\ArrayHelper;

class GridView extends \yii\grid\GridView
{
    public $layouts = "{summary}\n{items}\n{pager}";
    
    public $options = ['class' => 'card'];
    
    public function renderPager()
    {
        $pagination = $this->dataProvider->getPagination();
        if ($pagination === false || $this->dataProvider->getCount() <= 0) {
            return '';
        }
        /* @var $class LinkPager */
        $pager = $this->pager;
        $class = ArrayHelper::remove($pager, 'class', LinkPager::className());
        $pager['pagination'] = $pagination;
        $pager['view'] = $this->getView();

        return Html::tag('div', $class::widget($pager), ['class' => 'card-footer']);
    }
    
    public function renderItems() {
        return Html::tag('div', parent::renderItems(), ['class' => 'table-responsive']);
    }
    
    public function renderSummary() {
        return Html::tag('div', parent::renderSummary(), ['class' => 'm-3']);
    }
}