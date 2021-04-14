<?php 

namespace Core;

use Core\Component\Http\Response;
use QH\Routing\Route\RouteException;
use Core\Component\Http\ErrorViewHandler;
use Core\Component\EventEmitter\Event\{ArgumentEvent, ControllerEvent, RequestEvent, ResponseEvent, RouteEvent};

class App extends AbstractFrontController
{
    public function run()
    {   
 
        try{

            $this->eventEmitter->emit('core.request',new RequestEvent($this->request));

            $route = $this->routeResolver->resolve($this->request,$this->router);
            $this->eventEmitter->emit('core.route',new RouteEvent($route));

            
            $this->controllerResolver->setContainer($this->container);
            $controller = $this->controllerResolver->resolve($route);
            $this->eventEmitter->emit('core.controller',new ControllerEvent($controller));
            
            $this->argumentResolver->setContainer($this->container);
            $arguments = $this->argumentResolver->resolve($controller,$route);
            $this->eventEmitter->emit('core.argument',new ArgumentEvent($arguments));

            call_user_func_array($controller,$arguments);

        }
        catch (RouteException $e) {
            if($this->request->getUri() == "/") {
                call_user_func([new \Core\Component\Controller\DefaultController,'index']);
                return;
            }
            $message = ErrorViewHandler::show($e);
            print(new Response($message,$e->getCode()));
        }
        catch(\Exception $e) {
            $message = ErrorViewHandler::show($e);
            print(new Response($message,$e->getCode()));
        }


    }

}


