<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 
$title = $params->get('title');
$image = $params->get('image');
$price = $params->get('price');
$addtext = $params->get('addtext');
$optionName = $params->get('optionName');


for ($i = 1; $i <= 10; $i++) {
    $statusoption[$i] = $params->get('option' . $i);
    $statusprice[$i] = $params->get('price' . $i);
    if (empty($statusoption[$i]) OR empty($statusprice[$i])) {
	continue;
    }

    $state[$i] = JHTML::_('select.option', $params->get('price' . $i), $params->get('option' . $i));
}

?>
    <div class="simpleCart_shelfItem" >
	<img class="item_image" style="display:block" src="<?php echo $image ?>" alt="Image">
	<h2 class="item_name" style="display:block" ><?php echo $title ?></h2>
	<?php 
	if(isset($optionName)) {
	    echo JHTML::_('select.genericlist', $state, $name = 'select_tag' . $module->id, $attribs = null, $key = 'value', $text = 'text', $selected = NULL, $idtag = false, $translate = false ); 
	    $price = $params->get('price1');
	}?>
	
	<span id="simplecartprice<?php echo $module->id?>" class="item_price"><?php echo '$'.$price ?></span>
	<input class="item_quantity" value="1" type="hidden">
	<a href="javascript:;" class="item_add"><?php echo $addtext ?></a>
    </div>



    <script>
	jQuery.noConflict();
	jQuery("#select_tag<?php echo $module->id?>").change(function() {
	    //jQuery('#shoping_cart').toggle();
	    var selectvalue = jQuery("#select_tag<?php echo $module->id?>").val();
	    obj = document.getElementById("simplecartprice<?php echo $module->id?>");
	    obj.innerHTML = '$' + selectvalue;
	});
	

    </script>




