<?php
/**
 * simplecart_total Module Entry Point
 * 
 * @package    
 * @subpackage 
 * @link 
 * @license        
 * 
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$doc = JFactory::getDocument();
$doc->addStyleSheet( 'modules/mod_simplecart_total/assets/style.css' );
$doc->addScript( 'modules/mod_simplecart_total/assets/simpleCart.js' );
// Include the syndicate functions only once
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php' );
 
//$hello = modsimplecart_totalHelper::getHello( $params );
require( JModuleHelper::getLayoutPath( 'mod_simplecart_total' ) );
?>
