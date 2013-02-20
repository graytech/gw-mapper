<?php if ( !defined('ABSPATH') ) {exit;}


/**
 * Data structure exposer
 * 
 * Displays the data structure for any supplied value
 * 
 * @param   mixed $var
 * @access  public
 * @return  string
 */
if ( ! function_exists('print_pre')) {
    function print_pre($var, $return=false) {
        $retval = '<pre>'.print_r($var, true).'</pre>';
        if ($return) {
            return $retval;
        } else {
            echo $retval;
        }
    }
}

/**
 * Get current URL
 * 
 * Returns the current URL
 * 
 * @access  public
 * @return  string
 */
if ( ! function_exists('current_url')) {
    function current_url($return=true) {
        $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        if ($return) {
            return $pageURL;
        } else {
            echo $pageURL;
        }
    }
}