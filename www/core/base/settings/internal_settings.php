<?php 

if (!defined('VG_ACCESS')) die;

const TEMPLATE = 'templates/default/';
const ADMIN_TEMPLATE = 'core/admin/view/';
const UPLOAD_DIR = 'userfiles/';

const COOCKIE_VERSION = '1.0.0';
const CRYPT_KEY = '';
const COOCKIE_TIME = 60;
const BLOCK_TIME = 3;

const QTY = 8;
const QTY_LINKS = 3;

const ADMIN_CSS_JS = [
    'styles' => ['css/main.css'],
    'scripts' => []
];
const USER_CSS_JS = [
    'styles' => [],
    'scripts' => []
];

use core\base\exceptions\RouteException;

function load_class($class_name){
    $class_name = str_replace('\\', '/', $class_name);
    if(!@include_once $class_name.'.php'){
        throw new RouteException('Не верное имя файла для подключения - '.$class_name);
    }
}

spl_autoload_register( 'load_class' );