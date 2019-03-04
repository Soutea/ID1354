<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 14:24
 */

namespace TastyRecipe\View;


use TastyRecipe\Integration\UsernameConflictException;
use TastyRecipe\Model\InvalidPasswordException;

class Register extends BaseRequestHandler
{
    private $username;
    private $password;

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }


    function doExecute(){
        if($this->username) {
            try {
                $this->controller->register($this->username, $this->password);
                header("Location: /TastyRecipe/View/Index");
            } catch(InvalidPasswordException $exception) {
                $this->addVariable("registerError", $exception->getMessage());
            } catch(UsernameConflictException $exception) {
                $this->addVariable("registerError", $exception->getMessage());
            }
        }
        return 'register';

    }



}
