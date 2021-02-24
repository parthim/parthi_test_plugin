<?php
/**
 * @package parthi
 */
 
class plugin_deactivate {
    public static function deactivate() {
        // generate a CPT
        // flush rewrite rules
        flush_rewrite_rules();  
    }
}