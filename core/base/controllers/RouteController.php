<?php

namespace core\base\controllers;

use core\base\settings\Settings;
use core\base\settings\SiteSettings;

class RouteController
{
    static private $_instance;

    private function __clone()
    {
    }

    static public function getInstance(){
        if(self::$_instance instanceof self){
            return self::$_instance;
        }

        return self::$_instance = new self;
    }

    private function __construct()
    {
        $s = Settings::get('routes');
        $sp = SiteSettings::get('routes');
//        $sp = SiteSettings::get('templateArr');
        $s1 = $s['admin'];


        echo "<pre>";
        var_dump($sp);
        echo "</pre>";

    }
}