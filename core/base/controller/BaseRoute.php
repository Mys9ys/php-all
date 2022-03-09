<?php

namespace core\base\controller;

class BaseRoute
{

    use SingleTon, BaseMethods;

    public static function routeDirection(){

        if(self::instance()->isAjax()){

            exit ((new BaseAjax())->route());

        }

        RouteController::instance()->route();
    }
}