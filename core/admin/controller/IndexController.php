<?php

namespace core\admin\controller;

use core\admin\model\Model;
use core\base\controller\BaseController;

class IndexController extends BaseController
{
    protected function inputData(){

        $db = Model::instance();

        $query = "SELECT name1 FROM articles";

        $res = $db->query($query);

        exit('admin');
    }
}