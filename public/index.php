<?php

define('PROJECT_DIR',dirname(__DIR__));

use QH\Container\Container;

require_once PROJECT_DIR . '/vendor/autoload.php';
$containerConfiguration = require_once PROJECT_DIR . '/core/ContainerConfiguration.php';

$container = new Container(
    $containerConfiguration['services'],
    $containerConfiguration['mapping']
);

$app = $container->instanciate(Core\App::class);
$app->setContainer($container);
$app->run();


