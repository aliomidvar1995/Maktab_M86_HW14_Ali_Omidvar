<?php

namespace model;
use core\Model;

class RegisterModel extends Model {
    const TABLE_NAME = 'users';
    const PRIMARY_KEY = 'id';
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;
    public string $name = '';
    public string $rule = '';
    public string $email = '';
    public string $password = '';
    public string $confirm_password = '';
    public $status = self::STATUS_INACTIVE;

    

    public function save() {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules() {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'rule' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 4], [self::RULE_MAX, 'max' => 12]],
            'confirm_password' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    public function attributes(): array {
        return ['name', 'rule', 'email', 'password'];
    }
}