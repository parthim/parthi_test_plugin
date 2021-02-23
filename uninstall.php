<?php

/**
 * Trigger this file on Plugin Uninstall
 * 
 * @package parthi
 */

if (!defined('WP_UNINSTALL_PLUGIN')){
    die;
}
// Clear Database stored data
// 1. Using php

// // // $books =get_posts( array('post_type'=>'book','numberposts'=>-1 ));
// // // foreach ($books as $book)
// // // {
// // //     wp_delete_post( $book->ID, true );
// // // }

// 2. Use sql query
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type='book'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN(SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT id FROM wp_posts)");
