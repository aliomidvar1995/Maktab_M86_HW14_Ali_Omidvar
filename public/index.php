<?php

require_once "../vendor/autoload.php";

use controller\AuthController;
use controller\ProfileController;
use controller\SiteController;
use controller\TaskController;
use controller\DoctorController;
use core\Application;
use Dotenv\Dotenv;



$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];


$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/general', [SiteController::class, 'general']);

$app->router->get('/brain', [SiteController::class, 'brain']);

$app->router->get('/heart', [SiteController::class, 'heart']);

$app->router->get('/kidney', [SiteController::class, 'kidney']);

$app->router->get('/internal', [SiteController::class, 'internal']);

$app->router->get('/doctor', [ProfileController::class, 'doctor']);

$app->router->get('/patient', [ProfileController::class, 'patient']);

$app->router->post('/patient', [ProfileController::class, 'patient']);

$app->router->get('/manager', [ProfileController::class, 'manager']);

$app->router->get('/register', [AuthController::class, 'register']);

$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/login', [AuthController::class, 'login']);

$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->post('/doctor', [DoctorController::class, 'info']);


$app->run();