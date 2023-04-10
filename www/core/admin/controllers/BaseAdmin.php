<?php

namespace core\admin\controllers;

use core\admin\model\Model;
use core\base\settings\Settings;
use core\base\exceptions\RouteException;
use core\base\controllers\BaseController;

abstract class BaseAdmin extends BaseController
{

    protected $model;
    protected $table;
    protected $data;
    protected $title;
    protected $columns;
    protected $menu;

    protected function inputData()
    {
        $test = Settings::instance()->arrayMergeRecursive();

        $this->init(true);
 
        $this->title = 'engine';

        if (!$this->model) $this->model = Model::instance();
        if (!$this->menu) $this->menu = Settings::get('projectTables');

        $this->sendNoCacheHeaders();
    }

    protected function outputData()
    {
    }

    protected function sendNoCacheHeaders()
    {

        header("Last-Modified: " . gmdate("D, d m Y H:i:s" . " GMT"));
        header("Cache-Control: no-cache, must-revalidate");
        header("Cache-Control: max-age=0");
        header("Cache-Control: post-check=0,pre-check=0");
    }

    protected function execBase()
    {
        self::inputData();
    }

    protected function createTableData()
    {

        if (!$this->table) {
            if ($this->parameters) $this->table = array_keys($this->parameters)[0];
            else $this->table = Settings::get('defaultTable');
        }

        $this->columns = $this->model->showColumns($this->table);

        if (!$this->columns) new RouteException('Не найдены поля в таблице - ' . $this->table, 2);
    }

    protected function expansion($args = [], $settings = false)
    {

        $filename = explode('_', $this->table);
        $className = '';

        foreach ($filename as $item) {
            $className .= ucfirst($item);
        }

        if(!$settings){
            $path = Settings::get('expansion');
        }elseif(is_object($settings)){
            $path = $settings::get('expansion');
        }else{
            $path = $settings;
        }

        if (is_readable($_SERVER['DOCUMENT_ROOT'] . PATH . $class . '.php')) {

            $class = str_replace('/', '\\', $class);

            $exp = $class::instance();

            foreach($this as $name => $value){
                $exp->$name = $this->$name;
            }

            return $exp->expansion($args);

        }else{

            $file = $_SERVER['DOCUMENT_ROOT'] . PATH . $path . $this->table . '.php';

            extract($args);

            if(is_readable($file)) return include $file;

        }

        return false;
    }

    
}
