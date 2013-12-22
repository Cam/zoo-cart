
(function ($) {
	$(document).ready( function() { 
	 //	 var article =  $(document).first('.item');
	 	 // set cart config
	 
		/*var config = {};
	 	 config.checkout = {type:article.find('.config_checkout_type').val(), email: article.find('.config_checkout_email').val(), marchantID: article.find('.config_checkout_marchantID').val()};
	 	 config.currency = article.find('.config_checkout_currency').val(); 
	 	
	 	// tax 
	 	if (article.find('.config_shippingFlatRate').val())
	 	config.shippingFlatRate = article.find('.config_shippingFlatRate').val(); 
	 	
	 	else if (article.find('.config_shippingQuantityRate').val())
	 	config.shippingQuantityRate = article.find('.config_shippingQuantityRate').val();
	 	
	 	else if (article.find('.config_shippingTotalRate').val())
	 	config.shippingTotalRate = article.find('.config_shippingTotalRate').val();
	 	
	 	if (article.find('.config_taxShipping').val())
	 	config.taxShipping = article.find('.config_taxShipping').val();
	 	
	 	config.cartStyle = "div";
	 	config.excludeFromCheckout = ['image'];
	 	
	 	// tax rate
		if (article.find('.config_taxRate').val())
		config.taxRate = parseFloat(article.find('.config_taxRate').val());


	 	// add custom options to cart columns 
	 	
	 	config.cartColumns = new Array();
	 	if (article.find('.item_image').val())
	 	config.cartColumns.push({ attr: 'image' , label: 'Image', view: 'image' });
	 	
	 	config.cartColumns.push({ attr: "name" , label: "Name" } );
	 	
	 	if (article.find('.item_option1').val())
	 	config.cartColumns.push({ attr: article.find('.item_option1').val() , label: article.find('.item_option1').val() });
	 	
	 	if (article.find('.item_option2').val())
	 	config.cartColumns.push({ attr: article.find('.item_option2').val() , label: article.find('.item_option2').val() });
	 	
	 	if (article.find('.item_option3').val())
	 	config.cartColumns.push({ attr: article.find('.item_option3').val() , label: article.find('.item_option3').val() });
	 	
	 	if (article.find('.item_option4').val())
	 	config.cartColumns.push({ attr: article.find('.item_option4').val() , label: article.find('.item_option4').val() });
	 	
	 	if (article.find('.item_option5').val())
	 	config.cartColumns.push({ attr: article.find('.item_option5').val() , label: article.find('.item_option5').val() });
	 	
        config.cartColumns.push({ attr: "price" , label: "Price", view: 'currency' });
        config.cartColumns.push({ attr: "quantity" , label: "Qty", view: 'input' });
		config.cartColumns.push({ view: "remove" , text: "Remove" , label: false });
        config.cartColumns.push({ attr: "total" , label: "SubTotal", view: 'currency' });
        

	 //	console.log(config);
	 	
	 	// set config 
	 	simpleCart(config);
*/
	 	 $('.pre_item_add').click(function() {
	 	 
	 	 article =  $(this).closest('.item');
	 	 
	 	 // get properties
	 	 var item_price = article.find('.item_price').val();
	 	 var item_image = article.find('.item_image').val();
	 	 var item_name = article.find('.item_name').val();
	 	 var item_quantity = article.find('.item_quantity').val();
	 	 
	 	 var item_option1 = article.find('.item_option1').val();
	 	 var item_option2 = article.find('.item_option2').val();
	 	 var item_option3 = article.find('.item_option3').val();
	 	 var item_option4 = article.find('.item_option4').val();
	 	 var item_option5 = article.find('.item_option5').val();
	 	 
	 	 var cartObject = {};
	 	 cartObject.name = item_name;
	 	 cartObject.price = item_price;
	 	 cartObject.image = item_image;
	 	
	 	 // get quantity
	 	 var element = article.find('.option_'+item_quantity);
	 	 if (element.val())
	 	 	cartObject.quantity = element.val();
	 	 else
	 	 	cartObject.quantity = 1;
	 	 	
	 	 // get option 1
	 	 element = article.find('.option_'+item_option1);
	 	 if (element.val())
	 	 	cartObject[item_option1] = element.val();
	 	 	
	 	 // get option 2
	 	 element = article.find('.option_'+item_option2);
	 	 if (element.val())
	 	 	cartObject[item_option2] = element.val();
	 	 	
	 	 // get option 3
	 	 element = article.find('.option_'+item_option3);
	 	 if (element.val())
	 	 	cartObject[item_option3] = element.val();
	 	 	
	 	 // get option 4
	 	 element = article.find('.option_'+item_option4);
	 	 if (element.val())
	 	 	cartObject[item_option4] = element.val();
	 	 	
	 	 // get option 5
	 	 element = article.find('.option_'+item_option5);
	 	 if (element.val())
	 	 	cartObject[item_option5] = element.val();
	 	 
	 	 	
	 	 console.log(cartObject);
	
			 
	 	 simpleCart.add(cartObject);
    });
	  } );
}(jQuery));
