<?php

namespace core\admin\controller;

use core\admin\model\Model;
use core\base\controller\BaseController;

class IndexController extends BaseController
{
    protected function inputData()
    {
        include_once 'lib/functions.php';

        $db = Model::instance();

        $table = 'teachers';
        $color = ['r', 'g', 'b'];

        $files['gallery_img'] = ['red', 'green', 'blue'];
        $files['img'] = 'main.jpg';
        $_POST['name'] = 'Mys9ysilii';
        $_POST['id'] = '2';

//        $res = $db->add($table, [
//            'fields' => ['id', 'name'],
//            'fields' => ['name' => 'petr', 'content'=>'hello'],
//            'where' => ['name' => 'masha, sveta, ivan', 'fio' => "smi'rnova", 'color' => $color, 'arr' => 'SELECT id FROM'],
//            'where' => ['name'=>'masha'],
//            'operand' => ['IN', '%LIKE%', 'IN', '<>'],
//            'condition' => ['AND'],
//            'order' => ['fio', 'name'],
//            'order_direction' => ['DESC'],
//            'limit' => '1',
//        'except' => ['content'],
//        'files' => $files

//        ])[0];

//        $res = $db->edit($table, [
////           'fields' => ['id'=> 2, 'name' => 'Vasya'],
////            'files' => $files,
////            'where' => ['id' => 1]
//        ]);

        $res = $db->delete($table, [
//            'fields' => ['name', 'img'],
            'where' => ['id' => 6],
            'join'=> [
               [
                   'table' => 'students',
                   'on'=> ['student_id', 'id']
               ]
            ]

        ]);

        print_debug($res);

        exit('admin');
    }
}