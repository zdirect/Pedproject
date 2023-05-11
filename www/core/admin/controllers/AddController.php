<?php

use core\admin\controllers\BaseAdmin;

namespace core\admin\controllers;

class AddController extends BaseAdmin{
    
    protected function inputData()
    {
        if(!$this->userId) $this->execBase();

        $this->createTableData();

        $this->createOutputData();

    }

}