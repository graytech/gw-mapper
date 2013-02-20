<?php if ( !defined('ABSPATH') ) {exit;}
/**
 * @package GW Wordpress PayPal
 */

 
/**
 * ADMIN Class
 */
class gw_mapper_start extends gw_mapper
{

    protected $pages = array (

        'gwmapper-dashboard'     => array(
            'menu'      => 'Dashboard',
            'page'      => 'Dashboard',
            'access'    => 'manage_options'
        ),
        'gwmapper-options'   => array(
            'menu'      => 'Manage Options',
            'page'      => 'Manage Options',
            'access'    => 'manage_options'
        )
    );
   
    public function __construct () {
        parent::__construct();
        add_action('admin_menu', array($this, 'build_menus'));
    }
    
    public function build_menus () {

        add_menu_page(
            __('GW Mapper'),
            __('GW Mapper'),
            'manage_options',
            'gwmapper-dashboard',
            array($this,'gwmapper-dashboard')
        );
        
        foreach ($this->pages as $slug => $params) {
            add_submenu_page(
                'gwmapper-dashboard',
                __($params['page']),
                __($params['menu']),
                $params['access'],
                $slug,
                array($this, $slug)
            );
        }
    
    }
    
    public function __call ($name, $arguments) {
        $admin_control = dirname(__FILE__)."/modules/{$name}/start.php";
        if (file_exists($admin_control)) {
            include($admin_control);
        }
    }
    
}