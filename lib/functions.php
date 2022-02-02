<?php

function print_debug($arr, $text =''){
    echo '<pre>';
    print_r($text);
    echo '<br>';
    print_r($arr);
    echo '</pre>';
}