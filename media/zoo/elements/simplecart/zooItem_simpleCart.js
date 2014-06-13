
(function ($) {
	$(document).ready( function() { 
	
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
