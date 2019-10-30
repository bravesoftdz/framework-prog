<?php

$url = $_SERVER['REQUEST_URI'];
$arrayUrl = explode('/', $url);
unset($arrayUrl[0]);
print_r($arrayUrl); 

if (file_exists(__DIR__ . '/'. $arrayUrl[1] . '.php')) 
{
    echo 'Encontrou arquivo<br>';
    require_once(__DIR__ . '/'. $arrayUrl[1] . '.php');
    eval('$objt = new $arrayUrl[1];');
    if (empty($arrayUrl[2])) 
    {
        $objt->index();
    } else
    {
        $method = $arrayUrl[2];
        eval('$objt->$method();');
    }
    
} else
{
    echo 'Não encontrou arquivo';
}








