<?php 


namespace Core;


use Core\Component\EventEmitter\EventEmitterInterface;
use Core\Component\Config\ConfigLoader;
use Psr\Http\Message\RequestInterface;
use Core\Component\Controller\ArgumentResolverInterface;
use Core\Component\Controller\ControllerResolverInterface;
use QH\Routing\Router\RouterInterface;
use QH\Routing\Route\RouteResolverInterface;
use Psr\Container\ContainerInterface;


abstract class AbstractFrontController
{
    protected $request;
    protected $routeResolver;
    protected $controllerResolver;
    protected $argumentResolver;
    protected $router;
    protected $eventEmitter;
    protected $configLoader;
    protected $container;

    public function __construct(
        RequestInterface $request,
        RouteResolverInterface $routeResolver,
        ControllerResolverInterface $controllerResolver,
        ArgumentResolverInterface $argumentResolver, 
        RouterInterface $router,
        EventEmitterInterface $eventEmitter,
        ConfigLoader $configLoader
    )
    {
        $this->request = $request;
        $this->routeResolver = $routeResolver;
        $this->controllerResolver = $controllerResolver;
        $this->argumentResolver = $argumentResolver;
        $this->router = $router;
        $this->eventEmitter = $eventEmitter;
        $this->configLoader = $configLoader;

        $this->loadConfig();

        $this->loadRoutes();

        $this->loadEvents();

    }


    protected function loadConfig()
    {
        $config = require_once PROJECT_DIR . '/config/app.php';
        $this->configLoader->load($config);
    }

    protected function loadRoutes()
    {
        $router = $this->router;
        require_once $this->configLoader->routes('path');
    }

    protected function loadEvents()
    {
        $eventEmitter = $this->eventEmitter;
        require_once $this->configLoader->events('path');
    }

    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }

}