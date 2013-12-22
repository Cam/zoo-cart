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
	
        var config = {};
	 	 config.checkout = {type:"<?php echo $simplecartConfig['checkout_type'];?>", email: "<?php echo $simplecartConfig['checkout_email'];?>", marchantID: "<?php echo $simplecartConfig['checkout_marchantID'];?>"};
	 	 config.currency = "<?php echo $simplecartConfig['checkout_currency'];?>"; 
	 	
		 config.cartStyle = "div";
	 	 config.excludeFromCheckout = ['image'];
	 	
		<?php 
			if ($simplecartConfig['shippingFlatRate']) 
				echo "config.shippingFlatRate = ".$simplecartConfig['shippingFlatRate'].";"; 

			else if ($simplecartConfig['shippingQuantityRate']) 
				echo "config.shippingQuantityRate = ".$simplecartConfig['shippingQuantityRate'].";"; 
				
			else if ($simplecartConfig['shippingTotalRate']) 
				echo "config.shippingTotalRate = ".$simplecartConfig['shippingTotalRate'].";"; 
			
				// tax settings	
			if ($simplecartConfig['taxShipping']) 
				echo "config.taxShipping = ".$simplecartConfig['taxShipping'].";"; 
				
			if ($simplecartConfig['taxRate']) 
				echo "config.taxRate = ".$simplecartConfig['taxRate'].";"; 
				
		 ?>
	 	
	

	 	// add custom options to cart columns 
	 	
	 	config.cartColumns = new Array();
		
		<?php 
			if ($simplecartConfig['image_field']) 
				echo "config.cartColumns.push({ attr: 'image' , label: 'Image', view: 'image' });"; 
				
			echo " config.cartColumns.push({ attr: 'name' , label: 'Name' } );";
			
			// add custom options 
			if ($simplecartConfig['option1_field']) 
				echo "config.cartColumns.push({ attr: '".$simplecartConfig['option1_field']."', label: '".$simplecartConfig['option1_field']."' });" ; 
			
			if ($simplecartConfig['option2_field']) 
				echo "config.cartColumns.push({ attr: '".$simplecartConfig['option2_field']."', label: '".$simplecartConfig['option2_field']."' });" ; 
			
			if ($simplecartConfig['option3_field']) 
				echo "config.cartColumns.push({ attr: '".$simplecartConfig['option3_field']."', label: '".$simplecartConfig['option3_field']."' });" ; 
			
			if ($simplecartConfig['option4_field']) 
				echo "config.cartColumns.push({ attr: '".$simplecartConfig['option4_field']."', label: '".$simplecartConfig['option4_field']."' });" ; 
			
			if ($simplecartConfig['option5_field']) 
				echo "config.cartColumns.push({ attr: '".$simplecartConfig['option5_field']."', label: '".$simplecartConfig['option5_field']."' });" ; 
			
				
		 ?>
	
        config.cartColumns.push({ attr: "price" , label: "Price", view: 'currency' });
        config.cartColumns.push({ attr: "quantity" , label: "Qty", view: 'input' });
		config.cartColumns.push({ view: "remove" , text: "Remove" , label: false });
        config.cartColumns.push({ attr: "total" , label: "SubTotal", view: 'currency' });
        

	 //	console.log(config);
	 	
	 	// set config 
	 	simpleCart(config);


	
    </script>
</div>

