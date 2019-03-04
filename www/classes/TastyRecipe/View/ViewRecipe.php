<?php


namespace TastyRecipe\View;


class ViewRecipe extends BaseRequestHandler

{
    private $title;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    function doExecute()
    {
        $recipe = $this->controller->recipe($this->title);
        $comments = $this->controller->recipeComments($this->title);
        $this->addVariable("recipe", $recipe);
        $this->addVariable("comments", $comments);
        $this->addVariable("currentUserID", $this->controller->currentUserID);

        return 'recipe';
    }
}