<?php

namespace core\admin\controller;

use core\admin\model\Model;
use core\base\controller\BaseController;

class IndexController extends BaseController
{
    protected function inputData()
    {

        $db = Model::instance();

        $table = 'teachers';
        $color = ['r', 'g', 'b'];

        $res = $db->get($table, [
            'fields' => ['id', 'name'],
            'where' => ['name' => 'masha, sveta, ivan', 'fio' => "smi'rnova", 'color' => $color, 'arr' => 'SELECT id FROM'],
            'operand' => ['IN', '%LIKE%', 'IN', '<>'],
            'condition' => ['AND'],
            'order' => ['fio', 'name'],
            'order_direction' => ['DESC'],
            'limit' => '1',

        ]);

        exit('admin');
    }
}