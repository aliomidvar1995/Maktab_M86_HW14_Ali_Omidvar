<?php

namespace controller;
use core\Application;
use core\Controller;
use core\middlewares\AuthMiddleware;
use core\middlewares\ProfileMiddleware;
use core\Request;
use core\Response;
use model\DoctorModel;

class ProfileController extends Controller{
    public function __construct() {
        $this->registerMiddleware(new AuthMiddleware(['manager', 'patient', 'doctor']));
        $this->registerMiddleware(new ProfileMiddleware());
    }

    public static function manager(Request $request, Response $response) {
        $response->renderView('auth', 'manager', [
            'user' => Application::$app->user
        ]);
    }

    public static function doctor(Request $request, Response $response) {
        $doctorModel = new DoctorModel();
        $completed = $doctorModel->completed(Application::$app->user->id);
        $response->renderView('auth', 'doctor', [
            'user' => Application::$app->user,
            'completed' => $completed
        ]);
    }

    public static function patient(Request $request, Response $response) {
        $doctorModel = new DoctorModel();
        $doctors = $doctorModel->doctors();
        if(isset($request->getBody()['search']) && $request->getBody()['search'] === 'name'){
            $doctors = $doctorModel->nameSearch($request->getBody()['text']);
        }
        if(isset($request->getBody()['search']) && $request->getBody()['search'] === 'expertise') {
            $doctors = $doctorModel->expertiseSearch($request->getBody()['text']);
        }
        $response->renderView('auth', 'patient', [
            'user' => Application::$app->user,
            'doctors' => $doctors
        ]);
    }
}