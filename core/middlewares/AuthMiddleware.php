<?php

namespace core\middlewares;
use core\Application;
use core\exception\ForbiddenException;

class AuthMiddleware extends BaseMiddleware{
    public array $actions = [];

    public function __construct(array $actions = []) {
        $this->actions = $actions;
    }
    public function execute() {
        if(Application::$app->isGuest()) {
            if(in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}