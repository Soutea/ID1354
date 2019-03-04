<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 11:15
 */

namespace TastyRecipe\Model;


use TastyRecipe\Integration\Database;

class User
{
    static function login ($username, $password){ //måste vara static, hämtar information från databasen på egenhand
        $user = Database::get()->findByUsername($username); // ropar på get i Database
        if ($user !== false && password_verify($password, $user['password'])) {
            // användare/lösenord finns
            return $user['id'];
        } else {
            throw new LoginFailureException();
        }
    }

    static function register($username, $password) {
        if (strlen($password) < 8) {
            throw new InvalidPasswordException();
        }
        return Database::get()->createUser($username, password_hash($password, PASSWORD_BCRYPT));
    }
}

