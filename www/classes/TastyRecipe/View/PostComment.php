<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 16:21
 */

namespace TastyRecipe\View;


class PostComment extends BaseRequestHandler
{
    private $content;
    private $recipe;

    public function setContent($content)
    {
        $this->content = $content;
    }
    public function setRecipe($recipe)
    {
        $this->recipe = $recipe;
    }


    protected function doExecute()
    {
        $this->controller->postComment($this->content, $this->recipe);
        header("Location: /TastyRecipe/View/ViewRecipe?title=$this->recipe");
    }

}