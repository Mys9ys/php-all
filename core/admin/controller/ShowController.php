<?php

namespace core\admin\controller;

class ShowController extends BaseAdmin
{

    protected function inputData(){
        $this->exactBase();

        $this->createTableData();

        exit();
    }

    protected function outputData(){

    }

}