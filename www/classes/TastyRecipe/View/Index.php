<?php
/**
 * Shows the index page of the web application
 */

namespace TastyRecipe\View;


class Index extends BaseRequestHandler
{
    protected function doExecute()
    {
        return 'index';
    }

}