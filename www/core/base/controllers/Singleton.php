<?php 

namespace core\base\controllers;

trait Singleton{

    static private $_instance;

    private function _construct(){
        
    }

    public static function instance(){
        if(self::$_instance instanceof self){
            return self::$_instance;
        }

        self::$_instance = new self;

        if(method_exists(self::$_instance, 'connect')) {
            self::$_instance->connect();
        }
        
        return self::$_instance;
    }

    private function __clone()
    {
        
    }
}