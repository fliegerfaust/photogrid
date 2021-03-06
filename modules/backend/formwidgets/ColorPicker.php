<?php namespace Backend\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * Color picker
 * Renders a color picker field.
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */
class ColorPicker extends FormWidgetBase
{
    /**
     * {@inheritDoc}
     */
    public $defaultAlias = 'colorpicker';

    /**
     * @var array Default available colors
     */
    public $availableColors = [
        '#1abc9c', '#16a085',
        '#2ecc71', '#27ae60',
        '#3498db', '#2980b9',
        '#9b59b6', '#8e44ad',
        '#34495e', '#2b3e50',
        '#f1c40f', '#f39c12',
        '#e67e22', '#d35400',
        '#e74c3c', '#c0392b',
        '#ecf0f1', '#bdc3c7',
        '#95a5a6', '#7f8c8d',
    ];

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->availableColors = $this->getConfig('availableColors', $this->availableColors);
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('colorpicker');
    }

    /**
     * Prepares the list data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $value = $this->getLoadData();
        $this->vars['availableColors'] = $this->availableColors;
        $this->vars['isCustomColor'] = !in_array($value, $this->availableColors);
    }

    /**
     * {@inheritDoc}
     */
    public function loadAssets()
    {
        $this->addCss('vendor/colpick/css/colpick.css', 'core');
        $this->addJs('vendor/colpick/js/colpick.js', 'core');
        $this->addCss('css/colorpicker.css', 'core');
        $this->addJs('js/colorpicker.js', 'core');
    }

    /**
     * {@inheritDoc}
     */
    public function getSaveData($value)
    {
        return strlen($value) ? $value : null;
    }
}