<?php

namespace core\user\controller;

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

        $str = '1234567890';

        $en_str = \core\base\model\Crypt::instance()->encrypt($str);
        $dec_str = \core\base\model\Crypt::instance()->decrypt($en_str);
//
        exit();

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