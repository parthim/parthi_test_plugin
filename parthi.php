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

// If file is called directly , Abort !!!
if(!function_exists('add_action')) {
    echo "Access Denied";
    exit;
}

//If Commposer Autoload exists Require Once
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

use Inc\Base\Activate;
//Deactivate method called in the function itself
//  //use Inc\Base\Deactivate;

//Activate Function
function activate(){
        Activate :: activate();
    }
    //Activation hook
    register_activation_hook(__FILE__,'activate');

    // Deactivate function
    function deactivate() {
        Inc\Base\Deactivate :: deactivate();    
    }
    //Deactivation Hook
    register_deactivation_hook(__FILE__,'deactivate');
    
    // Calling init.php for initialising all the classes to the main php file   
    if(class_exists('Inc\\Init')) {
        Inc\Init :: register_services();
    }
    
    // use Inc\Pages\Admin;
    
    // class parthi {
        
        //     //  Visibility of a function
//     //  private
//     //  protected
//     //  public
//     public $BasePath;
//     function __construct () {
//         add_action( 'init',array($this,'custom_post_type' ));
//         $this-> BasePath =plugin_basename( __FILE__ );

//     }

//     //function to call all the remaining function
    
//     function custom_post_type() {
//         register_post_type('book',['public'=>true, 'label'=>'Books']);
//     }
  
// }
// if (class_exists('parthi')){
// $parthi  = new parthi();
// $parthi ->register();

// }

// //uninstall
// register_uninstall_hook(__FILE__,array($p,'uninstall'));