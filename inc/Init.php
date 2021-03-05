<?php
/**
 * @package parthi
 */

 namespace Inc;
 
final class Init {
    /**
     * Return  all the classes inside an array
     * @return array list of classes
     */
    public static function get_services() {
        return [
            Pages\Admin :: class,
            Base\Enqueue :: class,
            Base\SettingsLinks :: class
        ];
    }
    
    /**
     * Loop through the classes and intialize them,
     * and call the register() method if exists
     * @return
     */
    public static function register_services() {
        foreach(self::get_services() as $class) {
            $service = self:: instantiate ($class);
            if(method_exists($service,'register')){
                $service -> register();
            }
        }  
    }
    
    /**
     * Intialize the classes
     * @param class $class class from the services array
     * @return class Instance new instance of class
     */
    public static function instantiate($class) {
        $service = new $class();
        return $service;
    }
}


