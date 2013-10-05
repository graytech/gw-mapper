<?php if ( !defined('ABSPATH') ) {exit;}
/**
 * @package GW Mapper
 */

if ( ! function_exists('convert_html_to_text')) {
    include(dirname(__FILE__).'/lib/html2text.php');
} 
 
/**
 * FRONT Class
 */
class gw_mapper_start extends gw_mapper
{
        
    public function __construct() {
        parent::__construct();
        $theme_style_path = get_stylesheet_directory() . '/gwmapper.css';
        $theme_style_uri = dirname(get_stylesheet_uri()) . '/gwmapper.css';
        wp_enqueue_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB0wHBAvwwpsle4w7Hq4F1WWV-dWus3gys&sensor=true', array('jquery'), '3.0', false);   
        wp_enqueue_script('gwmapper', GWMAPPER_URL . '/front/gwmapper.js', array('jquery','googlemaps'), '1.0', false);   
        if (file_exists($theme_style_path)) {
            wp_enqueue_style('gwmapper', $theme_style_uri, false, '1.0');   
        } else {
            wp_enqueue_style('gwmapper', GWMAPPER_URL . '/front/gwmapper.css', false, '1.0');   
        }
        add_shortcode( 'gwmapper', array($this, 'shortcode_gwmapper') ); 
    }

    
    public function shortcode_gwmapper( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'center'        => 'Detroit, MI',
            'zoom'          => 2,
            'width'         => 300,
            'height'        => 300
        ), $atts ) );
        
        $addresses = array();
        if (!is_null($content)) {
            $addresses = $this->extract_address_array($content);
        }
        
        // build and return html response
        ob_start();
        include(dirname(__FILE__).'/template.php');
        return ob_get_clean(); 
    }
    
    protected function extract_address_array($html) {
        $addresses = @convert_html_to_text($html);
        $addresses = explode("\n", $addresses);
        $address_out = array();
        foreach ($addresses as $address ) {
            if (trim($address) != '') {
                $address_out[] = $address;
            }
        }
        return $address_out;
    }
    
}
