<?php

namespace model;
use core\Model;

class LoginModel extends Model{
    const TABLE_NAME = 'users';
    const PRIMARY_KEY = 'id';
    public string $email = '';
    public string $password = '';

    public function rules() {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    public function loginValidation() {
        $user = $this->findOne(['email' => $this->email]);
        if(!$user) {
            $this->addErrorMessage('email', 'user does not exist with this email');
            return false;
        }
        if(!password_verify($this->password, $user->password)) {
            $this->addErrorMessage('password', 'password is incorrect');
            return false;
        }
        return true;
    }
}