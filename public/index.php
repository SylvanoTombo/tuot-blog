<?php

use App\Router;

require '../vendor/autoload.php';

define('DEBUG_TIME', microtime(true));

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new Router(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views');

$router->get('/blog', 'post/index', 'blog')
       ->get('/blog/category', 'category/show', 'category')
       ->run();