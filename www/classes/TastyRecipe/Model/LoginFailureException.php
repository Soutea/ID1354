<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 11:47
 */

namespace TastyRecipe\Model;


use Exception;

class LoginFailureException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Invalid username/password combination");
    }


}