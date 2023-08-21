<?php

use core\admin\controllers\BaseAdmin;

namespace core\admin\controllers;

use core\base\settings\Settings;

class AddController extends BaseAdmin{
    
    protected function inputData()
    {
        if(!$this->userId) $this->execBase();

        $this->createTableData();

        $this->createForeignData();

        $this->createOutputData();

    }

    protected function createForeignData($settings = false){

        if(!$settings) $settings = Settings::instance();

        $rootItems = $settings::get('rootItems');

        $keys = $this->model->showForeignKeys($this->table);

        if($keys){
            foreach($keys as $item){

                if(in_array($this->table, $rootItems['tables'])){
                    $this->foreignData['COLUMN_NAME'][0]['id'] = 0;
                    $this->foreignData['COLUMN_NAME'][0]['name'] = $rootItems['name'];
                }

            }

        }

    }

}