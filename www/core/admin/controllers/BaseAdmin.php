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

    protected $columns;
    protected $menu;

    protected function inputData()
    {

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

    protected function createData($arr = [], $add = true)
    {

        $fields = [];
        $order = [];
        $order_direction = [];

        if ($add) {

            if (!$this->columns['id_row']) return $this->data = [];

            $fields[] = $this->columns['id_row'] . ' as id';
            if ($this->columns['name']) $fields['name'] = 'name';
            if ($this->columns['img']) $fields['img'] = 'img';

            if (count($fields) < 3) {
                foreach ($this->columns as $key => $item) {
                    if (!$this->fields['name'] && strpos($key, 'name') !== false) {
                        $fields['name'] = $key . ' as name';
                    }
                    if (!$this->fields['img'] && strpos($key, 'img') == 0) {
                        $fields['img'] = $key . ' as img';
                    }
                }
            }

            if ($arr['fields']) {
                if (is_array($arr['fields'])) {
                    $fields = Settings::instance()->arrayMergeRecursive($fields, $arr['fields']);
                } else {
                    $fields[] = $arr['fields'];
                }
            }

            if ($this->columns['parent_id']) {
                if (!in_array('parent_id', $fields)) $fields[] = 'parent_id';
                $order[] = 'parent_id';
            }

            if ($this->columns['manu_position']) $order[] = 'menu_position';
            elseif ($this->columns['date']) {
                if ($order) $order_direction = ['ASC', 'DESC'];
                else $order_direction[] = ['DESC'];

                $order[] = 'date';
            }

            if ($arr['order']) {
                if (is_array($arr['order'])) {
                    $order = Settings::instance()->arrayMergeRecursive($order, $arr['order']);
                } else {
                    $order[] = $arr['order'];
                }
            }
            if ($arr['order_direction']) {
                if (is_array($arr['order_direction'])) {
                    $order_direction = Settings::instance()->arrayMergeRecursive($order_direction, $arr['order_direction']);
                } else {
                    $order_direction[] = $arr['order_direction'];
                }
                $order_direction = Settings::instance()->arrayMergeRecursive($order_direction, $arr['order_direction']);
            }
        } else {

            if (!$arr) return $this->data = [];

            $fields = $arr['fields'];
            $order = $arr['order'];
            $order_direction = ['order_direction'];
        }

        $this->data = $this->model->get($this->table, [
            'fields' => $fields,
            'order' => $order,
            'order_direction' => $order_direction
        ]);
    }

    protected function expansion($args = [])
    {

        $filename = explode('_', $this->table);
        $className = '';

        foreach ($filename as $item) {
            $className .= ucfirst($item);
        }

        $class = Settings::get('expansion') . $className . 'Expansion';

        if (is_readable($_SERVER['DOCUMENT_ROOT'] . PATH . $class . '.php')) {

            $class = str_replace('/', '\\', $class);

            $exp = $class::instance();

            $res = $exp->expansion($args);
        }
    }
}
