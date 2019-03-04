<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 11:29
 */

namespace TastyRecipe\View;

class Logout extends BaseRequestHandler
{

    function doExecute()
    {
        $this->controller->logout();
        return 'logout';
    }


}