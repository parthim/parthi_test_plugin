<?php
/**
 * @package parthi
 */
/*
Plugin Name: parthi test-plugin
Plugin URI: https://www.example.com/
Description: Used by millions, Akismet is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
Version: 4.1.7
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

if(!function_exists('add_action')) {
    echo "Access Denied";
    exit;
}
class parthi {
function __construct () {
    add_action( 'init',array($this,'custom_post_type' ));
}

    function activate() {
        // generate a CPT
        $this ->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();  
    }

    function deactivate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }
    // function uninstall() {
    //     //Delete CPT
    //     // Delete all the plugin data from the DB     // No need for a seperate uninstall method instead use a seperate php file named uinstall.php
    // }
    function custom_post_type() {
        register_post_type('book',['public'=>true, 'label'=>'Books']);
    }
        

}
if (class_exists('parthi')){
$parthi  = new parthi();
}
//activation
register_activation_hook(__FILE__,array($parthi,'activate'));

// deactivate
register_deactivation_hook(__FILE__,array($parthi,'deactivate'));

//uninstall
// register_uninstall_hook(__FILE__,array($parthi,'uninstall'));