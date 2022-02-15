<?php

namespace core\base\settings;

class SiteSettings extends Settings
{

    use BaseSettings;

    private $baseSettings;

    private $templateArr = [
        'text' => ['price', 'short'],
        'textarea' => ['goods_content']
    ];

    private $routes = [
        'plugins' => [
            'dir' => 'dir',
            'routes' => [
                'route1' => ['1', '2']
            ]
        ],
    ];

//    private $expansion = 'core/plugin/expansion/';



}