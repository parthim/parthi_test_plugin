<?php
/**
 * @package parthi
 */
 
class plugin_activate {
    public static function activate() {
        // generate a CPT
        // flush rewrite rules
        flush_rewrite_rules();  
    }
}