<?php
/**
 * @package parthi
 */
/*
Plugin Name: parthi test-plugin
Plugin URI: https://www.example.com/
Description: This is a test plugin created to learn how to develop a plugin in wordpress.
Version: 0.1
Author: Parthiban
Author URI: https://www.example.com/
License: GPLv2 or later
Text Domain: parthi
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/
// Only comments

//  //  php code commented out for future or reference purpose


if(!function_exists('add_action')) {
    echo "Access Denied";
    exit;
}
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

use Inc\Activate;
use Inc\DeActivate;
use Inc\Admin\AdminPages;

class parthi {

    //  Visibility of a function
    //  private
    //  protected
    //  public
    public $BasePath;
    function __construct () {
        $this-> BasePath =plugin_basename( __FILE__ );
        add_action( 'init',array($this,'custom_post_type' ));
    }

    //function to call all the remaining function
    function register ()
    {
        // For backend
        add_action( 'admin_enqueue_scripts',array($this,'enqueue'));
        add_action( 'admin_menu',array($this,'add_admin_pages') );
        
        // For frontend
        //  // add_action( 'wp_enqueue_scripts',array($this,'enqueue'));
        
        add_filter( "plugin_action_links_$this->BasePath",array($this,'settings_link') );
    }
    //for filter plugin action link
    function settings_link ($links) {
        //add custom settings link
        $setting_link = '<a href="admin.php ?page=parthiii_plugin">Settings</a>';
        array_push($links, $setting_link);
        return $links;
    }
    
    // add_admin_pages function
    function add_admin_pages () {
        add_menu_page( 'Parthi Plugin', 'Parthi', 'manage_options', 'parthiii_plugin', array($this,'admin_index'), 'dashicons-store', 110 );
    }
    function admin_index() {
        // require templates
        require_once plugin_dir_path( __FILE__ ).'templates/admin.php';
    }
    //Activate Function
    function activate(){
        Activate :: activate();
    }
    // // Deactivate function
    function deactivate() {
        // flush rewrite rules
        //  //  require_once plugin_dir_path( __FILE__ ).'inc/parthi_plugin_deactivate.php';
        //calling the function in deactivate.php directly or go down to deactivate for another way of calling
        DeActivate :: deactivate();    
    }
    function custom_post_type() {
        register_post_type('book',['public'=>true, 'label'=>'Books']);
    }
    function enqueue(){
        // enqueue all of the style
        wp_enqueue_style( 'myPluginStyle', plugins_url( '/assets/style.css', __FILE__ ) );
        
        //enqueue all the scripts
        wp_enqueue_script( 'myPluginScript', plugins_url( '/assets/script.js', __FILE__ ) );

        
    }    

}
if (class_exists('parthi')){
$parthi  = new parthi();
$parthi ->register();
}
//activation function called from another file
//  //  require_once plugin_dir_path( __FILE__ ).'inc/parthi_plugin_activate.php';
//  //  register_activation_hook(__FILE__,array('plugin_activate','activate'));
// Activate.php is called using composer autoload

// deactivate calling a function in this php which calls another function from another php file
//  //  register_deactivation_hook(__FILE__,array($parthi,'deactivate'));
// DeActivate.php is called using composer autoload

//uninstall
register_uninstall_hook(__FILE__,array($parthi,'uninstall'));


// // Static method

// // // class example {
    // // //     public static function exp ($data){
    // // //         echo "<script>console.log('Hello " . $data . "' );</script>";
    // // //     }
// // //    }

// calling a static function without any objects or initializing a class

    // // example :: exp("World");