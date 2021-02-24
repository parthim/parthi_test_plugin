<?php
/**
 * @package parthi
 */
 
namespace Inc;

class Deactivate {
    public static function deactivate() {
        // generate a CPT
        // flush rewrite rules
        flush_rewrite_rules();  
    }
}