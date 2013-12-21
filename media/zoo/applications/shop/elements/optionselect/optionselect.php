<?php
/**
* @package   com_zoo
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// register ElementOption class
App::getInstance('zoo')->loader->register('ElementOption', 'elements:option/option.php');

/*
	Class: ElementSelect
		The select element class
*/
class ElementOptionSelect extends ElementOption {

	/*
	   Function: edit
	       Renders the edit form field.

	   Returns:
	       String - html
	*/
	public function edit(){

		
		$options_from_config = array(array('value'=>true, 'name'=> 'Show'), array('value'=>false, 'name'=> 'Hide'));
		$options = array();
			foreach ($options_from_config as $option) {
				$options[] = $this->app->html->_('select.option', $option['value'], $option['name']);
			}

			$option = $this->get('option', array());

			return $this->app->html->_('select.radiolist', $options, $this->getControlName('option', true), null, 'value', 'text', (isset($option[0]) ? $option[0] : null));
	}


	public function render($params = array()) {


	$options_from_config = $this->config->get('option', array());
		$multiple 			 = $this->config->get('multiple');
		$default			 = $this->config->get('default');
        $name   			 = $this->config->get('name');

		if (count($options_from_config)) {

			// set default, if item is new
			if ($default != '' && $this->_item != null && $this->_item->id == 0) {
				$this->set('option', $default);
			}

			$options = array();
            if (!$multiple) {
                $options[] = $this->app->html->_('select.option', '', '-' . JText::sprintf('Select %s', $name) . '-');
            }
            foreach ($options_from_config as $option) {
				$options[] = $this->app->html->_('select.option', $option['value'], $option['name']);
			}

			$style = $multiple ? 'multiple="multiple" size="5"' : 'class="option_'.$this->config->get('name').'"';

			$html[] = $this->app->html->_('select.genericlist', $options, $this->getControlName('option', true), $style, 'value', 'text', $this->get('option', array()));

			// workaround: if nothing is selected, the element is still being transfered
			$html[] = '<input type="hidden" name="'.$this->getControlName('select').'" value="1" />';

			return implode("\n", $html);
		}

		return JText::_("There are no options to choose from.");
	}

}