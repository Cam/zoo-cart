<?php
/**
 * simplecart Module Entry Point
 * 
 * @package    
 * @subpackage 
 * @link 
 * @license        
 * 
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php' );
 
//$hello = modsimplecartHelper::getHello( $params );
require( JModuleHelper::getLayoutPath( 'mod_simplecart' ) );
?>
