<?php

/**
 * ddWidgetFormInputToggleSwitch class
 * 
 * This provides a toggle switch widget 
 *
 * @package scss
 * @author David Durost <david.durost@gmail.com>
 * @see sfWidgetFormInputCheckbox
 */
class ddWidgetFormInputToggleSwitchPlugin extends sfWidgetFormInputCheckbox {
  /**
   * default labels for the switch
   *
   * @var array
   */
  protected static $LABELS = array('OFF','ON');

  /**
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetFormInput
   */
  protected function configure($options = array(), $attributes = array()) {
    parent::configure($options, $attributes);
    
    if(sfConfig::get('app_ddWidgetFormInputToggleSwitchPlugin_include_js')) {
      $this->addOption('js_path', sfConfig::get('app_ddWidgetFormInputToggleSwitchPlugin_js_path'));
      $this->addOption('include_jquery', false);
      $this->addOption('css_path', sfConfig::get('app_ddWidgetFormInputToggleSwitchPlugin_css_path'));
    }
    self::$LABELS = (isset($options['labels']) ? $options['labels'] : self::$LABELS);
    
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavaScripts()
  {
    $js = array(
      $this->getOption('js_path') . '/ddWidgetFormInputToggleSwitch.js',
    );

    if($this->getOption('include_jquery'))
      $js[] = "http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js";
      
    return $js;
  }
  
  public function getStylesheets() {
    $css = array(
        $this->getOption('css_path').'/ddWidgetFormInputToggleSwitch.css',
    );
    return $css;
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $attributes = array_merge($attributes);
    parent::render($name, $value, $attributes, $errors);
    
  }
}
