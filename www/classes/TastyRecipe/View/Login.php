<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 11:55
 */

namespace TastyRecipe\View;
Use Id1354fw\View\AbstractRequestHandler;
use TastyRecipe\Model\LoginFailureException;


class Login extends BaseRequestHandler
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

    function doExecute()
    {
        if($this->username) {
            try {
                $this->controller->login($this->username, $this->password);
                header("Location: /TastyRecipe/View/Index");
            } catch(LoginFailureException $exception) {
                $this->addVariable("loginError", $exception->getMessage());
            }
        }
        return 'login';
    }


}