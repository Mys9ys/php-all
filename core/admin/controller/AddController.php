<?php

namespace core\admin\controller;

class AddController extends BaseAdmin
{

    protected function inputData()
    {
        if(!$this->userId) $this->execBase();

        $this->createTableData();

        $this->CreateOutputData();

        print_debug($this->model->showForeignKeys('articles'));
    }
}