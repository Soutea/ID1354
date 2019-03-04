<?php

namespace TastyRecipe\Integration;


use Exception;

class UsernameConflictException extends \Exception
{
    public function __construct()
    {
        parent::__construct("There is already a user with that username");
    }

}