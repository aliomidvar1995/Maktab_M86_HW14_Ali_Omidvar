<?php

namespace model;

use core\Application;
use core\Model;
use PDO;

class DoctorModel extends Model {
    const TABLE_NAME = 'doctor_info';
    const PRIMARY_KEY = 'id';
    public string $image = '';
    public string $expertise = '';
    public $saturday = '';
    public $sunday = '';
    public $monday = '';
    public $tuesday = '';
    public $wednesday = '';
    public $thursday = '';
    public $friday = '';
    public $user_id;

    public function attributes(): array {
        return ['image', 'expertise', 'saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'user_id'];
    }

    // public function index($expertise) {
    //     $SQL = "SELECT * FROM users
    //     JOIN doctor_info ON users.id = doctor_info.user_id
    //     WHERE expertise = :expertise";
    //     $statement = $this->prepare($SQL);
    //     $statement->execute([
    //         'expertise' => $expertise
    //     ]);
    //     $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }

    public function completed($user_id) {
        $SQL = "SELECT * FROM users
        JOIN doctor_info ON users.id = doctor_info.user_id
        WHERE user_id = :user_id";
        $statement = $this->prepare($SQL);
        $statement->execute([
            'user_id' => $user_id
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function index($expertise) {
        $SQL = "SELECT * FROM users
        JOIN doctor_info ON users.id = doctor_info.user_id
        WHERE expertise = :expertise";
        $statement = $this->prepare($SQL);
        $statement->execute([
            'expertise' => $expertise
        ]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function doctors() {
        $SQL = "SELECT * FROM users
        JOIN doctor_info ON users.id = doctor_info.user_id";
        $statement = $this->prepare($SQL);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function nameSearch($name) {
        $SQL = "SELECT * FROM users
        JOIN doctor_info ON users.id = doctor_info.user_id
        WHERE name LIKE :name";
        $statement = $this->prepare($SQL);
        $statement->execute([
            'name' => "%$name%"
        ]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function expertiseSearch($expertise) {
        $SQL = "SELECT * FROM users
        JOIN doctor_info ON users.id = doctor_info.user_id
        WHERE expertise LIKE :expertise";
        $statement = $this->prepare($SQL);
        $statement->execute([
            'expertise' => "%$expertise%"
        ]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function image() {
        $image = $_FILES['image'];
        $imageArr = explode('.', $image['name']);
        $extension = end($imageArr);
        $imageName = Application::$app->user->id.'.'.$extension;
        move_uploaded_file($image['tmp_name'], '../images/'.$imageName);
        $this->image = $imageName;
    }
}