<?php
/**
 * @package parthi
 */

 namespace Inc\Base;
 
class Activate {
    public static function activate() {
        // generate a CPT
        // flush rewrite rules
        flush_rewrite_rules();  
    }
}