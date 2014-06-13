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

// load config
require_once(JPATH_ADMINISTRATOR.'/components/com_zoo/config.php');

// get app
$zoo = App::getInstance('zoo');

// load zoo frontend language file
$zoo->system->language->load('com_zoo');

// init vars
$path = dirname(__FILE__);

//register base path
$zoo->path->register($path, 'mod_simplecart_total');

if (!$application = $zoo->table->application->get($params->get('application', 0))) {
	return null;
}

// get cart element
$elements =  $application->getTypes();
$elements = $elements['item']->config->elements;
foreach ($elements as $element)
{
	if ($element['type'] == 'simplecart')
	{
		$simplecartConfig = $element;
		break;
	}
	
}

// Include the syndicate functions only once
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php' );
 
//$hello = modsimplecart_totalHelper::getHello( $params );
require( JModuleHelper::getLayoutPath( 'mod_simplecart_total' ) );
?>
