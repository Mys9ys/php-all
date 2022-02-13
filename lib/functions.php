<?php

function print_debug($arr, $text ='', $exit = false){
    echo '<pre>';
    print_r($text);
    echo '<br>';
    print_r($arr);
    echo '</pre>';
    if($exit) exit;
}

if(!function_exists('mb_str_replace')){

    function mb_str_replace($needle, $text_replace, $haystack){
        var_dump(implode($text_replace, explode($needle, $haystack)));
        return implode($text_replace, explode($needle, $haystack));
    }

}