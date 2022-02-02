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

        $files['gallery_img'] = ['red', 'green', 'blue'];
        $files['img'] = 'main.jpg';

        $res = $db->add($table, [
//            'fields' => ['id', 'name'],
            'fields' => ['name' => 'olga', 'content'=>'hello'],
//            'where' => ['name' => 'masha, sveta, ivan', 'fio' => "smi'rnova", 'color' => $color, 'arr' => 'SELECT id FROM'],
//            'where' => ['name'=>'masha'],
//            'operand' => ['IN', '%LIKE%', 'IN', '<>'],
//            'condition' => ['AND'],
//            'order' => ['fio', 'name'],
//            'order_direction' => ['DESC'],
//            'limit' => '1',
        'except' => ['content'],
        'files' => $files

        ])[0];

        exit('admin');
    }
}