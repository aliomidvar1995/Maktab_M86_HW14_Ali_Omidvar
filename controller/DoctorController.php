<?php


namespace controller;
use core\Application;
use core\Controller;
use core\Request;
use core\Response;
use model\DoctorModel;

class DoctorController extends Controller {
    public static function info(Request $request, Response $response) {
        $doctorModel = new DoctorModel();
        $doctorModel->image();
        $doctorModel->loadData($request->getBody());
        $doctorModel->save();
        $response->redirect('/doctor');
    }
}