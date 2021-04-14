<?php

namespace Core\Component\Controller;

use QH\Routing\Route\Route;
use Core\Component\Controller\ControllerException;
use QH\Container\Container;

class ControllerResolver implements ControllerResolverInterface
{

    private $container;

    public function resolve(Route $route): callable
    {
       
        if ($route->getCallback() instanceof \Closure) {
            return $route->getCallback();
        }

        $controllerStringParse = explode('::', $route->getCallback());

        if (count($controllerStringParse) === 0) {
            throw new ControllerCannotSetException('Cannot set controller');
        }

        $class = $controllerStringParse[0];
        $method = $controllerStringParse[1];

        if (!class_exists($class)) {
            throw new ControllerClassNotFoundException('"' . $class . '" class not found');
        }

        $instanceOfClass = $this->container !== null ? $this->container->instanciate($class) : new $class;

        if (!method_exists($instanceOfClass, $method)) {
            throw new ControllerMethodNotFoundException('method "' . $method . '" not found in "' . $class . '"');
        }

        return [$instanceOfClass, $method];

    }


    public function setContainer(Container $container)
    {
        $this->container = $container;
    }


}