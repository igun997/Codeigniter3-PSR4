<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;

class RouterInit extends CI_Controller {

    public function index()
    {
        $container = new Container;
        $request = Request::capture();
        $container->instance('Illuminate\Http\Request', $request);
        $events = new Dispatcher($container);
        $router = new Router($events, $container);
        require_once APPPATH . "routes/web.php";
        $redirect = new Redirector(new UrlGenerator($router->getRoutes(), $request));
        try {
            $response = $router->dispatch($request);
            $response->send();
        }catch (Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e){
            show_404();
        }
    }
}
