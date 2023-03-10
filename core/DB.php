<?php

namespace core;
use PDO;

class DB{
    public PDO $conn;

    public function __construct(array $config) {
        global $config;
        $dsn = $config['db']['dsn'] ?? '';
        $user = $config['db']['user'] ?? '';
        $password = $config['db']['password'] ?? '';
        $this->conn = new PDO($dsn, $user, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigration() {
        $this->createMigrationTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];

        $files = scandir(dirname(__DIR__).'/migration');

        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach($toApplyMigrations as $migration) {
            if($migration === '.' || $migration === '..') {
                continue;
            }
            require_once(dirname(__DIR__).'/migration/'.$migration);
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className;
            $this->log("applying migration $migration");
            $instance->up();
            $this->log("applied migration $migration");
            $newMigrations[] = $migration;
        }
        if(!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        }else {
            $this->log('all migrations are applied');
        }
    }
    public function createMigrationTable() {
        $this->conn->exec("CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
    }

    public function getAppliedMigrations() {
        $statement = $this->conn->prepare("SELECT migration FROM migrations");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations) {
        $src = implode(',', array_map(fn($m) => "('$m')", $migrations));
        $statement = $this->conn->prepare("INSERT INTO migrations (migration) VALUES
        $src
        ");
        $statement->execute();
    }

    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    protected function log($message) {
        print('['.date('Y-m-d H:i:s').'] - '.$message.PHP_EOL);
    }


    // Query Builder //

    public function save() {
        $tableName = static::TABLE_NAME;
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = $this->prepare("INSERT INTO $tableName (".implode(',', $attributes).")
        VALUES (".implode(',', $params).")");
        foreach($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
    }

    public function findOne($where) {
        $tableName = static::TABLE_NAME;
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = $this->prepare("SELECT * FROM $tableName WHERE $sql");
        foreach($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    // public function index() {
    //     $tableName = static::TABLE_NAME;
    //     // $attributes = array_keys();
    //     // $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
    //     $statement = $this->prepare("SELECT * FROM $tableName");
    //     // foreach($where as $key => $value) {
    //     //     $statement->bindValue(":$key", $value);
    //     // }
    //     $statement->execute();
    //     return $statement->fetchAll(PDO::FETCH_OBJ);
    // }

    // public function show() {
    //     $tableName = static::TABLE_NAME;
    //     $attributes = array_keys($where);
    //     $sql = "SELECT * FROM doctor_info
    //     JOIN users ON user_id = users.id WHERE ";
    //     foreach($where as $key => $value) {
    //         $statement->bindValue(":$key", $value);
    //     }
    //     $statement->execute();
    //     return $statement->fetchObject(static::class);
    // }
}