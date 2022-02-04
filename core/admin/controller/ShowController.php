<?php

namespace core\admin\controller;

class ShowController extends BaseAdmin
{

    protected function inputData(){
        $this->execBase();

        $this->createTableData();

        $this->createData();

        return $this->expansion(get_defined_vars());

        print_debug($this->data, 'trest');
    }

    protected function outputData(){

    }

}