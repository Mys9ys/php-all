<?php

namespace core\admin\controller;

use core\admin\model\Model;
use core\base\controller\BaseController;

class IndexController extends BaseController
{
    protected function inputData(){

        $db = Model::instance();

        $table = 'teachers';

        $res = $db->get($table, [
            'fields' => ['id', 'name'],
            'where'=> ['fio'=> 'smirnova', 'name'=> 'masha'],
            'operand' => ['=', '<>'],
            'condition' => ['AND'],
            'order' => ['fio', 'name'],
            'order_direction' => ['ASC', 'DESC'],
            'limit'
        ]);

        exit('admin');
    }
}