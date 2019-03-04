<?php


namespace TastyRecipe\View;


class ViewRecipeCommentsJSON extends BaseRequestHandler

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

        // Skapar en ny array för modellen i javascript
        $viewModelComments = [];
        foreach ($comments as $comment) {
            $viewModelComments[] = [
                'id' => $comment->id,
                'content' => $comment->content,
                'date' => $comment->date->format('Y-m-d h:ia'),
                'user' => $comment->username,
                'canDelete' => $comment->user === $this->controller->currentUserID,
            ];
        }

        // echo => skriv till webbläsaren
        header("Content-Type: application/json");
        echo json_encode($viewModelComments);
    }
}
