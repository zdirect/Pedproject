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
        return self::$_instance = new self;
    }

    private function __clone()
    {
        
    }
}