<?php

namespace controller;
use core\Application;
use core\Controller;
use core\DB;
use core\middlewares\AuthMiddleware;
use core\Request;
use core\Response;
use model\LoginModel;
use model\RegisterModel;

class AuthController extends Controller{

    public function __construct() {
        $this->registerMiddleware(new AuthMiddleware(['manager', 'patient', 'doctor']));
    }
    public static function register(Request $request, Response $response) {
        $registerModel = new RegisterModel();
        if($request->isPost()) {
            
            $registerModel->loadData($request->getBody());
            $registerModel->validation();
            
            if(empty($registerModel->errors)) {
                $registerModel->save();
                Application::$app->session->setFlash('success', 'Thanks for registering');
                $user = $registerModel->findOne(['email' => $registerModel->email]);
                Application::$app->session->set(RegisterModel::PRIMARY_KEY, $user->{RegisterModel::PRIMARY_KEY});
                $response->redirect('/'.$user->rule);
            }
            $response->renderView('auth', 'register', [
                'model' => $registerModel,
                'errors' => $registerModel->errors
            ]);
        }
        $response->renderView('auth', 'register', [
            'errors' => $registerModel->errors
        ]);
    }


    public static function login(Request $request, Response $response) {
        $loginModel = new LoginModel();
        if($request->isPost()) {
            $loginModel->loadData($request->getBody());
            $loginModel->validation();
            $loginModel->loginValidation();
            if(empty($loginModel->errors)) {
                $user = $loginModel->findOne(['email' => $loginModel->email]);
                // print('<pre>');
                // print_r($user);
                // print('</pre>');
                // exit();
                Application::$app->session->set(RegisterModel::PRIMARY_KEY, $user->{RegisterModel::PRIMARY_KEY});
                // var_dump($user);
                // exit();
                $response->redirect("/".$user->rule);
            }
            $response->renderView('auth', 'login', [
                'model' => $loginModel,
                'errors' => $loginModel->errors
            ]);
        }
        $response->renderView('auth', 'login', [
            'errors' => $loginModel->errors
        ]);
    }
    public static function logout(Request $request, Response $response) {
        Application::$app->session->remove(RegisterModel::PRIMARY_KEY);
        Application::$app->user = null;
        $response->redirect('/login');
    }
}