<?php
/**
 * @package parthi
 */

namespace Inc\Base;
use \Inc\Base\BaseController;

class Enqueue extends BaseController{

    public function register() {
        add_action( 'admin_enqueue_scripts',array($this,'enqueue'));
        add_action( 'admin_menu',array($this,'add_admin_pages') );
    }

    public function enqueue(){
        // enqueue all of the style
        wp_enqueue_style( 'myPluginStyle',$this->plugin_url . 'assets/style.css' );
        
        //enqueue all the scripts
        wp_enqueue_script( 'myPluginScript',$this->plugin_url . 'assets/script.js' );

        
    }
}