<?php

namespace core;
use core\exception\ForbiddenException;
use core\exception\NotfoundException;

class Router {
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }
    public function render() {
        $path = $this->request->path();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false) {
            throw new NotFoundException();
        }
        if(is_array($callback)) {
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            foreach($controller->middlewares as $middleware) {
                $middleware->execute();
            }
        }
        return call_user_func($callback, $this->request, $this->response);
    }
}