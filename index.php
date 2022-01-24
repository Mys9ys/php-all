<?php

define('VG_ACCESS', true);

header('Content-Type:text/html; charset=utf-8');
session_start();

require_once 'config.php';
require_once 'core/base/settings/internal_settings.php';
require_once 'lib/functions.php';

use core\base\controller\RouteController;
use core\base\exceptions\RouteException;

try{
//    RouteController::getInstance()->route();
    RouteController::getInstance();
}
catch (RouteException $e){
    exit($e->getMessage());
}

$arr = [1,2,3];

print_debug($arr);