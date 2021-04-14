<?php 

use QH\Container\Dependencies\{ServiceCollection,MappingCollection};
use QH\Container\Dependencies\DTO\Service;

return [

    'services' => new ServiceCollection([
            'core.router'                       =>  new Service(\QH\Routing\Router\Router::class),
            'core.route.resolver'               =>  new Service(\QH\Routing\Route\RouteResolver::class),
            'core.controller.resolver'          =>  new Service(\Core\Component\Controller\ControllerResolver::class),
            'core.controller.argument.resolver' =>  new Service(\Core\Component\Controller\ArgumentResolver::class), 
            'core.event.emitter'                =>  new Service(\Core\Component\EventEmitter\EventEmitter::class),
            'core.request'                      =>  new Service(\Core\Component\Http\Request::class,[$_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER]),
            'core.response'                     =>  new Service(\Core\Component\Http\Response::class),
            'core.config.loader'                =>  new Service(\Core\Component\Config\ConfigLoader::class),
    ]),

    'mapping' => new MappingCollection([
            'Psr\Http\Message\RequestInterface' => 'core.request',
            'Core\Component\Http\Interfaces\ResponseInterface' => 'core.response',
            'Core\Component\Controller\ControllerResolverInterface' => 'core.controller.resolver',
            'Core\Component\Controller\ArgumentResolverInterface' => 'core.controller.argument.resolver',
            'Core\Component\EventEmitter\EventEmitterInterface' => 'core.event.emitter',
            'QH\Routing\Router\RouterInterface' => 'core.router',
            'QH\Routing\Route\RouteResolverInterface' => 'core.route.resolver',
            'Core\Component\Config\ConfigLoaderInterface' => 'core.config.loader',
    ]),
    
];
