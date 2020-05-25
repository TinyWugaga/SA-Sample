<?php

/**
 * 這是一個被包裝的範例
 *
 * @author Shisha 2019-10-27
 * @license MIT
 */

namespace Router;

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Accessor
{
    protected $routes = [];

    private $methods = ['get','post'];

    public function __construct()
    {
    }

    /**
     * 創建 get 路由
     * 
     * @param  string $url
     * @return mixed $callback
     * @throws Exception
     */
    public function get(string $url, $callback)
    {
        $this->routes[] = [
            'url' => $url,
            'method' => 'get',
            'callback' => $callback
        ];
    }

    /**
     * 創建 get 路由
     * 
     * @param  string $url
     * @return mixed $callback
     * @throws Exception
     */
    public function post(string $url, $callback)
    {
        $this->routes[] = [
            'url' => $url,
            'method' => 'post',
            'callback' => $callback
        ];
    }

    /**
     * 檢查 route method 類別
     * 
     * @param  string $method
     * @return string 
     */
    public function checkMethod(string $method)
    {
        if (!in_array($method, $this->methods)) {
            return 'get';
        }

        return $method;
    }

    /**
     *  初始化 Router 路由集
     * 
     * @param  string $url
     * @return mixed $callback
     * @throws Exception
     */
    public function initial(App $app)
    {
        foreach ($this->routes as $key => $route) {

            $url      = $route['url'];
            $method   = $this->checkMethod($route['method']);
            $callback = $route['callback'];

            $app->{$method}($url, function (Request $request, Response $response, $args) use ($callback) {

                call_user_func($callback, $request, $response);

                return $response;
            });
        }
    }
}
