<?php

namespace core;
use core\middlewares\BaseMiddleware;
use PDO;

class Controller {
    // public string $layout = 'main';

    public array $middlewares = [];
    public string $action = '';

    // public function setLayout($layout) {
    //     $this->layout = $layout;
    // }
    
    public function registerMiddleware(BaseMiddleware $middleware) {
        $this->middlewares[] = $middleware;
    }
}