<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 12:09
 */

namespace TastyRecipe\View;


use Id1354fw\View\AbstractRequestHandler;
use TastyRecipe\Controller\Controller;

abstract class BaseRequestHandler extends AbstractRequestHandler
{
    /**
     * @var Controller
     */
    protected $controller;

    public function execute()
    {
        $this->session->restart();
        $this->controller = $this->session->get("controller");
        if (!$this->controller) { //om det inte finns en controller
            $this->controller = new Controller();
            $this->session->set("controller", $this->controller);
        }

        $this->addVariable("loggedIn", $this->controller->userLoggedIn());

        parent::execute();

        $this->session->set("controller", $this->controller);
    }

}