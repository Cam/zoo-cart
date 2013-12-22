<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$Image = $params->get('Image');
?>


<div id="cart-module" title="Show/Hide Shopping Cart" >
    <span class="simpleCarticon"><img src="<?php echo $Image ?>"></span>
    <span class="simpleCart_total"></span>
    (<span class="simpleCart_quantity"></span> Items)
</div>

<div id="shoping_cart" style="display:none">
    <div id="framename">Shopping Bag</div>
    <div id="empty_cart"><a href="javascript:;" class="simpleCart_empty">empty</a> | <a href="javascript:;" id="simpleCart_close">close</a></div>
    <section>
      
        <div class="simpleCart_items"></div>
	<div  id="checkoutdiv"><button  id="checkout"  class="simpleCart_checkout">Checkout&nbsp;(<span class="simpleCart_total"></span>)</button></div>


    </section>

    <script>
	jQuery.noConflict();
	jQuery('#cart-module').click(function() {
		jQuery('#shoping_cart').fadeIn('slow', function() {
      });
	});
	
	jQuery('#simpleCart_close').click(function() {
		jQuery('#shoping_cart').fadeOut('slow', function() {
      });
	});
	
       
	
    </script>
</div>

