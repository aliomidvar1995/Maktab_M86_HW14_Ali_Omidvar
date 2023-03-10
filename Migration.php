<?php

require_once "vendor/autoload.php";

use core\Application;
use core\DB;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];


$app = new Application(__DIR__, $config);

$db = $app->db;

$db->applyMigration();