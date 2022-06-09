<?php

namespace core\user\controller;

use core\admin\model\Model;
use core\base\controller\BaseController;

class IndexController extends BaseController
{
    protected $name;

    protected function inputData(){
//        $template = $this->render(false, ['name'=>'pasha']);

//        $name = 'pasha';
//        $content = $this->render('', compact('name'));
//        $header = $this->render(TEMPLATE . 'header');
//        $footer = $this->render(TEMPLATE . 'footer');
//
//        return compact('header','content',  'footer');
//        $this->init();

//        $str = '1234abcd';
//
//        $en_str = \core\base\model\Crypt::instance()->encrypt($str);
//
//        print_debug($en_str);
//
//        $dec_str = \core\base\model\Crypt::instance()->decrypt($en_str);
//
//        print_debug($dec_str);
//
//        exit();

        $model = Model::instance();

        $res = $model->get('teachers', [
            'where' => ['id' => '6,7'],
            'operand' => ['IN'],
            'join' => [
                'stud_teach' => ['on' => ['id', 'teachers']],
                'students' => [
                    'fields' => ['name as student_name', 'content'],
                    'on' => ['students', 'id']
                ]
            ],
            'join_structure' => true
        ]);

        print_debug($res);

        exit;

//        print_debug($res);



    }

//    protected function outputData(){
//        $vars = func_get_arg(0);
//
////        var_dump($vars);
//
////        return $vars;
//        $this->page = $this->render(TEMPLATE . 'templater', $vars);
//    }
}