<?php

namespace core\middlewares;
use core\Application;
use core\exception\ForbiddenException;

class ProfileMiddleware extends BaseMiddleware{
    public array $actions = [];

    public function __construct() {
        if(isset(Application::$app->user->rule)) {
            if(Application::$app->user->rule === 'manager') {
                $this->actions = ['patient', 'doctor'];
            }
            if(Application::$app->user->rule === 'patient') {
                $this->actions = ['manager', 'doctor'];
            }
            if(Application::$app->user->rule === 'doctor') {
                $this->actions = ['manager', 'patient'];
            }
        }
    }
    public function execute() {
        if(!Application::$app->isGuest()) {
            if(in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}