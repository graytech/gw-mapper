<?php if ( !defined('ABSPATH') ) {exit;}
/**
 * @package GW Mapper
 */
/*
Plugin Name: GW Mapper
Description: A plugin to allow the insertion of Google Maps using short codes
Version: 1.0
Author: Gray Kales (Grayworld Media)
Author URI: http://grayworld.com
*/


require_once(dirname(__FILE__).'/functions.php');

define('GWMAPPER_URL', plugins_url('/gw-mapper'));

abstract class gw_mapper
{
 
    public function __construct() {}

}

if (is_admin()) {
    include(dirname(__FILE__).'/admin/class.main.php');
} else {
    include(dirname(__FILE__).'/front/class.main.php');
}

$gwmapper= new gw_mapper_start();
