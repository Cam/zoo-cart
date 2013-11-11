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
        <style>

/*	    #cart-module {
		cursor: pointer;
		font-size: 11px;
		margin: 0 auto;
		width: 130px;
	    } */
	    .simpleCarticon{
		background: url("../images/cart.png") no-repeat scroll 0 0 transparent;
		display: inline-block;
		height: 22px;
		vertical-align: middle;
		width: 22px;
	    }
            #framename{
/*                font-size: 24px;
                font-weight: bold; */

            }
            #shoping_cart{
	/*	background-color: #FFFFFF;

		margin-left: -642px;
                left: 50%;
		padding: 15px;
		position: absolute;
		top: 29px;
		width: 500px;
		z-index: 99;
		border: solid thin #D4DE23;
		font-weight: bold;
		-webkit-border-radius: .7em;

		-moz-border-radius: .7em;

		border-radius: .7em; */
            }
            #empty_cart{
       /*         float: inherit;
                text-align: right;
                margin-right: 43px; */
            }
            .simpleCart_items th{
          /*      color:#333;
                text-align:left;
                padding:10px 30px;

                background: #ededed;
                background: -moz-linear-gradient(top,  #f7f7f7 0%, #ededed 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f7f7f7), color-stop(100%,#ededed));
                background: -webkit-linear-gradient(top,  #f7f7f7 0%,#ededed 100%);
                background: -o-linear-gradient(top,  #f7f7f7 0%,#ededed 100%);
                background: -ms-linear-gradient(top,  #f7f7f7 0%,#ededed 100%);
                background: linear-gradient(top,  #f7f7f7 0%,#ededed 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7f7f7', endColorstr='#ededed',GradientType=0 ); */
            }
            .simpleCart_items td{
 /*               padding: 0 5px !important;
                vertical-align:middle; */


            }
            .item-image,
            .item-image img /* {width:60px;} */
            .item-name{ 
/*		font-style: italic;
		font-weight: bold;
		width: 220px */
	    }
            .item-quantity,
            .item-quantity input{
                width:30px;
                text-align:center;
            }
            .item-price,
            .item-subtotal/* {width:50px;} */
            #checkout {
   /*             float: inherit;
                text-align: center;
                padding: .5em;

		width: 15em;

		padding: .5em;

		color: #ffffff;

		text-shadow: 1px 1px 1px #000;

		border: solid thin #D4DE23;
		font-weight: bold;
		-webkit-border-radius: .7em;

		-moz-border-radius: .7em;

		border-radius: .7em;

		-webkit-box-shadow: 2px 2px 3px #999; 

		box-shadow: 2px 2px 2px #bbb;

		background-color: #A3CE36;

		background-image: -webkit-gradient(linear, left top, left bottom, from(#e9ede8), to(#ce401c),color-stop(0.4, #8c1b0b)); */
            }
/*	    #checkoutdiv {
		width: 100%;
		text-align: center;
		} */








	    .simpleCart_shelfItem {
/*		margin: 20px 0;
		text-align: center;
		width: 150px; */
	    }

	    .simpleCart_shelfItem h2{
/*		font-size: 14px;
		font-weight: bold;
		margin: 0px; */
	    }

	    .simpleCart_shelfItem .item_price{
/*		font-size: bold;
		font-style: italic; */
	    }

	    .item_add{
/*		float: inherit;
		text-align: center;
		padding: .3em;
		display:block;
		width: 11em;
		font-size: 13px;
		color: #ffffff;

		text-shadow: 1px 1px 1px #000;

		border: solid thin #D4DE23;
		font-weight: bold;
		-webkit-border-radius: .7em;

		-moz-border-radius: .7em;

		border-radius: .7em;

		-webkit-box-shadow: 2px 2px 3px #999; 

		box-shadow: 2px 2px 2px #bbb;

		background-color: #A3CE36;

		background-image: -webkit-gradient(linear, left top, left bottom, from(#e9ede8), to(#ce401c),color-stop(0.4, #8c1b0b)); */
	    }


        </style>
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
	
        simpleCart({
            //Setting the Cart Columns for the sidebar cart display.
            cartColumns: [
                { attr: "image", label: "", view: "image"},
                //Name of the item
                { attr: "name" , label: "" },
                { attr: "price", label: "", view: "currency" },
                //Subtotal of that row (quantity of that item * the price)
                { attr: "total" , label: "", view: "currency"  },
                //Quantity displayed as an input
                { attr: "quantity", label: "", view: "input"}
                //Built in view for a remove link
			
                //Price of item
			
            ],
            cartStyle: "div"
        });
	
    </script>
</div>

