<?php

ini_set('display_errors',1);

require __DIR__ .'/../bootstrap/app.php';

use MeuFramework\Application\Application;

$app = new Application;

$container = $app->getContainer();

$container['config'] = function()
{
    return [
        'driver' =>'mysql',
        'host'   =>'localhost',
        'dbname' => 'mini_framework',
        'user'   => 'root',
        'pass'   => ''
    ];
};

$container['db'] = function($c){
    
    $config = $c->config;
    
    return new PDO("{$config['driver']}:host={$config['host']};dbname={$config['dbname']};",
             $config['user'], $config['pass']);
}; 


