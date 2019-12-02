<?php
namespace sky\adminlte\widgets;

use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

class SideNav extends \yii\bootstrap4\Nav
{
    public $options = [
        'class' => 'nav nav-pills nav-sidebar flex-column',
        'role' => 'menu',
        'data-widget' => 'treeview'
    ];
    
    public $dropdownClass = 'sky\adminlte\widgets\SideNav';
    
    public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
        $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $iconCls = ArrayHelper::getValue($item, 'iconCls', 'far fa-circle nav-icon');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
        $disabled = ArrayHelper::getValue($item, 'disabled', false);
        $active = $this->isItemActive($item);

        if (empty($items)) {
            $items = '';
        } else {
            Html::addCssClass($options, ['widget' => 'has-treeview']);
            $label .= Html::tag('i', '', ['class' => 'right fas fa-angle-left']);
            if (is_array($items)) {
                $items = $this->isChildActive($items, $active);
                $items = $this->renderDropdown($items, $item);
            }
        }

        Html::addCssClass($options, 'nav-item');
        Html::addCssClass($linkOptions, 'nav-link');

        if ($disabled) {
            ArrayHelper::setValue($linkOptions, 'tabindex', '-1');
            ArrayHelper::setValue($linkOptions, 'aria-disabled', 'true');
            Html::addCssClass($linkOptions, 'disabled');
        } elseif ($this->activateItems && $active) {
            Html::addCssClass($linkOptions, 'active');
        }
        
        $label = Html::tag('i', '', ['class' => 'nav-icon ' . $iconCls]) . ' ' . Html::tag('p', $label);

        return Html::tag('li', Html::a($label, $url, $linkOptions) . $items, $options);
    }
    
    protected function renderDropdown($items, $parentItem)
    {
        $dropdownClass = $this->dropdownClass;
        return $dropdownClass::widget([
            'options' => ['class' => 'nav nav-treeview'],
            'items' => $items,
            'encodeLabels' => $this->encodeLabels,
            'clientOptions' => false,
            'view' => $this->getView(),
        ]);
    }
}
