<?php
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Router;
/** @var $router Router */

class RouteObject {
    public static $ns;
    public static function setNamespace(string $ns):void
    {
        self::$ns = $ns;
    }

    public static function loadClass(string $class,string $method)
    {
        return self::$ns."\\$class@$method";
    }


}
RouteObject::setNamespace("App\controllers");
$router->name('home')->get('/', RouteObject::loadClass("Sample","index"));

$router->group(["prefix"=>"contoh","namespace"=>"App\controllers"],function () use($router){
    $router->get("/","Sample@index");
    $router->get("/aa","Sample@index");
});

$router->name('home')->get('/akun', function () {
    return 'hello world!';
});
