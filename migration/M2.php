<?php
use core\Application;
use core\DB;

class M2 {

    public function up() {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE doctor_info (
            id INT NOT NULL AUTO_INCREMENT,
            image VARCHAR(255) NOT NULL,
            expertise VARCHAR(255) NOT NULL,
            saturday VARCHAR(255) NOT NULL,
            sunday VARCHAR(255) NOT NULL,
            monday VARCHAR(255) NOT NULL,
            tuesday VARCHAR(255) NOT NULL,
            wednesday VARCHAR(255) NOT NULL,
            thursday VARCHAR(255) NOT NULL,
            friday VARCHAR(255) NOT NULL,
            user_id INT NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (user_id) REFERENCES users(id)
        );";
        $db->conn->exec($SQL);
    }
    public function down() {
        $db = Application::$app->db;
        $SQL = "DROP TABLE doctor_info;";
        $db->conn->exec($SQL);
    }
}