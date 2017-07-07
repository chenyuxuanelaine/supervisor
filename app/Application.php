<?php
namespace App;

use App\Http\Logic\Idl\MessageApi;
use App\Http\Logic\Idl\QuestionItemApi;
use App\Http\Logic\Idl\WindfallApi;
use App\Http\Logic\Idl\WordsApi;
use App\Http\Logic\PermissionsApi;
use App\Http\Logic\LoginApi;
use App\Http\Logic\Idl\TagsApi;
use App\Http\Logic\Idl\OperationApi;
use App\Http\Logic\Idl\ConstellationApi;
use App\Http\Logic\Idl\QuestionApi;
use App\Rpc\Service\Common\CommonServiceClient;
use Predis\Client;

/**
 * Class Application
 * @package App
 * @property Client redis
 * @property UserApi userApi
 * @property OperationApi operationApi
 */
class Application extends \Laravel\Lumen\Application {

    private $routeController = false;

    public function __construct($basePath)
    {
        parent::__construct($basePath);
        $this->routeController = new VersionRoute();
    }

    /**
     * //返回全局实例
     * @return Application
     */
    public static function one()
    {
        return self::getInstance();
    }

    protected function callControllerAction($routeInfo)
    {
        if (isset($_SERVER['HTTP_VERSION'])) {
            $version = $_SERVER['HTTP_VERSION'];
            $routeInfo[1]['uses'] = $this->routeController
                ->handle($this, $routeInfo[1]['uses'], $version);
        }

        return parent::callControllerAction($routeInfo);
    }


    /**
     * Route a controller to a URI with wildcard routing.
     *
     * @param  string  $uri
     * @param  string  $controller
     * @param  array   $names
     * @return void
     */
    public function routeController($uri, $controller, $names = [])
    {
        $action = $this->parseAction($controller);

        if (isset($this->groupAttributes)) {
            if (isset($this->groupAttributes['prefix'])) {
                $uri = trim($this->groupAttributes['prefix'], '/').'/'.trim($uri, '/');
            }

            $action = $this->mergeGroupAttributes($action);
        }

        $prepended = $action;


        $routable = (new ControllerInspector)
            ->getRoutable($prepended['uses'], $uri);

        // When a controller is routed using this method, we use Reflection to parse
        // out all of the routable methods for the controller, then register each
        // route explicitly for the developers, so reverse routing is possible.
        foreach ($routable as $method => $routes) {
            foreach ($routes as $route) {
                $this->registerInspected($route, $controller, $method, $names);
            }
        }
    }

    /**
     * Register an inspected controller route.
     *
     * @param  array   $route
     * @param  string  $controller
     * @param  string  $method
     * @param  array   $names
     * @return void
     */
    protected function registerInspected($route, $controller, $method, &$names)
    {
        $action = ['uses' => $controller.'@'.$method];

        // If a given controller method has been named, we will assign the name to the
        // controller action array, which provides for a short-cut to method naming
        // so you don't have to define an individual route for these controllers.
        $action['as'] = Arr::get($names, $method);

        $this->{$route['verb']}($route['uri'], $action);
    }
}
