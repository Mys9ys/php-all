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
            'where' => ['name' => 'masha, sveta, ivan', 'fio' => 'smirnova', 'color' => $color],
            'operand' => ['IN', '%LIKE%', 'IN'],
            'condition' => ['AND'],
            'order' => ['fio', 'name'],
            'order_direction' => ['DESC'],
            'limit' => '1',
            'join' => [
                'join_table1' => [
                    'table'=> 'join_table1',
                    'fields' => ['id as j_id'. 'name as j_name'],
                    'type'=> 'left',
                    'where' => ['name'=> 'masha'],
                    'operand' => ['='],
                    'condition' => ['OR'],
//                    'on'=>  ['id', 'parent_id']
                    'on'=> [
                        'table' => 'teachers',
                        'fields' => ['id', 'parent_id']
                    ]
                ],
                'join_table2' => [
                    'table'=> 'join_table2',
                    'fields' => ['id as j2_id'. 'name as j2_name'],
                    'type'=> 'left',
                    'where' => ['name'=> 'masha'],
                    'operand' => ['='],
                    'condition' => ['OR'],
                    'on'=> [
                        'table' => 'teachers',
                        'fields' => ['id', 'parent_id']
                    ]
                ]
            ]
        ]);

        exit('admin');
    }
}