<?php

namespace core\base\controllers;

class RouteController
{
    static private $_instance;

    static public function getInstace(){
        return self::$_instance;
    }
}