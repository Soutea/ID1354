<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 16:21
 */

namespace TastyRecipe\View;


class DeleteComment extends BaseRequestHandler
{
    private $commentID, $recipe;

    public function setCommentID($commentID)
    {
        $this->commentID = $commentID;
    }

    public function setRecipe($recipe)
    {
        $this->recipe = $recipe;
    }

    protected function doExecute()
    {
        $this->controller->deleteComment($this->commentID);
        header("Location: /TastyRecipe/View/ViewRecipe?title=$this->recipe");
    }
}