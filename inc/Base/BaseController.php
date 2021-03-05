<?php
/**
 * @package parthi
 */

namespace Inc\Base;



class BaseController {
    public $plugin_path;
    public $plugin_url;
    public $plugin;

    public function __construct () {
        // Plugin Path is defined in this constant 
        $this -> plugin_path = plugin_dir_path( dirname(__FILE__,2) );
        //Plugin URL is defined in this constant
        $this -> plugin_url = plugin_dir_url( dirname(__FILE__,2) );
        //Plugin name
        $this -> plugin = plugin_basename( dirname(__FILE__,3) ).'/parthi.php' ;
    }
}