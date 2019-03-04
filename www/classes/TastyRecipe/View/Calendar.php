<?php
/**
 * Shows the index page of the web application
 */

namespace TastyRecipe\View;



class Calendar extends BaseRequestHandler
{
    protected function doExecute()
    {
        return 'calendar';
    }

}