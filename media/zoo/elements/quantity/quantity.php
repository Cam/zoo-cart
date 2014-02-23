<?php
/**
* @package   com_zoo
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

/*
	Class: ElementItemLink
		The item link element class
*/
class ElementQuantity extends Element {

	/*
		Function: hasValue
			Checks if the element's value is set.

	   Parameters:
			$params - render parameter

		Returns:
			Boolean - true, on success
	*/
	public function hasValue($params = array()) {
		$value = $this->get('option');
		return $value[0];
	}

	/*
	   Function: edit
	       Renders the edit form field.

	   Returns:
	       String - html
	*/
	public function edit() {
			
		$options_from_config = array(array('value'=>true, 'name'=> 'Show'), array('value'=>false, 'name'=> 'Hide'));
		$options = array();
			foreach ($options_from_config as $option) {
				$options[] = $this->app->html->_('select.option', $option['value'], $option['name']);
			}

			$option = $this->get('option', array());

			return $this->app->html->_('select.radiolist', $options, $this->getControlName('option', true), null, 'value', 'text', (isset($option[0]) ? $option[0] : null));
	
	}

	/*
		Function: render
			Renders the element.

	   Parameters:
            $params - render parameter

		Returns:
			String - html
	*/
	public function render($params = array()) {
		
		 return $this->app->html->_('control.text', $this->getControlName('value'), '1', 'size="5" title="'.$this->config->get('name').'" class="option_'.$this->config->get('name').'"'); 


/*		$params = $this->app->data->create($params);
		$text = JText::_($params->get('link_text') ? $params->get('link_text') : 'READ_MORE');
		return $this->_item->getState() ? '<a href="' . $this->app->route->item($this->_item) . '">' . $text . '</a>' : $text;*/
	}

}