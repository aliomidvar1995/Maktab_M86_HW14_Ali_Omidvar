<?php

namespace controller;
use core\Application;
use core\Controller;
use core\DB;
use core\Request;
use core\Response;
use model\DoctorModel;
use model\RegisterModel;

class SiteController extends Controller {
    public static function home(Request $request, Response $response) {
        if(Application::$app->isGuest()){
            Application::$app->response->renderView('main', 'home');
        }
        Application::$app->response->renderView('main', 'home', [
            'user' => Application::$app->user
        ]);
    }

    public static function general(Request $request, Response $response) {
        $doctorModel = new DoctorModel();
        $users = $doctorModel->index('پزشک عمومی');
        if(Application::$app->isGuest()){
            Application::$app->response->renderView('main', 'brain', [
                'user' => Application::$app->user,
                'users' => $users
            ]);
        }
        Application::$app->response->renderView('main', 'brain', [
            'user' => Application::$app->user,
            'users' => $users
        ]);
    }

    public static function brain(Request $request, Response $response) {
        $doctorModel = new DoctorModel();
        $users = $doctorModel->index('متخصص مغز و اعصاب');
        if(Application::$app->isGuest()){
            Application::$app->response->renderView('main', 'brain', [
                'user' => Application::$app->user,
                'users' => $users
            ]);
        }
        Application::$app->response->renderView('main', 'brain', [
            'user' => Application::$app->user,
            'users' => $users
        ]);
    }

    public static function heart(Request $request, Response $response) {
        $doctorModel = new DoctorModel();
        $users = $doctorModel->index('متخصص قلب و عروق');
        if(Application::$app->isGuest()){
            Application::$app->response->renderView('main', 'heart', [
                'user' => Application::$app->user,
                'users' => $users
            ]);
        }
        Application::$app->response->renderView('main', 'heart', [
            'user' => Application::$app->user,
            'users' => $users
        ]);
    }

    public static function kidney(Request $request, Response $response) {
        $doctorModel = new DoctorModel();
        $users = $doctorModel->index('متخصص کلیه');
        if(Application::$app->isGuest()){
            Application::$app->response->renderView('main', 'kidney', [
                'user' => Application::$app->user,
                'users' => $users
            ]);
        }
        Application::$app->response->renderView('main', 'kidney', [
            'user' => Application::$app->user,
            'users' => $users
        ]);
    }

    public static function internal(Request $request, Response $response) {
        $doctorModel = new DoctorModel();
        $users = $doctorModel->index('متخصص داخلی');
        if(Application::$app->isGuest()){
            Application::$app->response->renderView('main', 'internal', [
                // 'user' => Application::$app->user,
                'users' => $users
            ]);
        }
        Application::$app->response->renderView('main', 'internal', [
            'user' => Application::$app->user,
            'users' => $users
        ]);
    }
}