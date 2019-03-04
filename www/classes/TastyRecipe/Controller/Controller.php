<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 11:43
 */

namespace TastyRecipe\Controller;

use TastyRecipe\Model\Comment;
use TastyRecipe\Model\User;
use TastyRecipe\Model\Recipe;

class Controller
{
    public $currentUserID;

    function logout (){
        $this->currentUserID = null;
    }

    function login ($username, $password){
        $this->currentUserID = User::login($username, $password);
    }

    function userLoggedIn() {
        return $this->currentUserID !== null;
    }

    function register($username, $password){
        User::register($username, $password);
        $this->login($username, $password);
    }

    function recipe($title){
        return Recipe::findByTitle($title);
    }

    function recipeComments($title) {
        return Comment::commentsForRecipe($title);
    }

    function postComment($content, $recipe){
        Comment::postNew($this->currentUserID, $content, $recipe);

    }

    function deleteComment($commentID){
        Comment::deleteComment($commentID, $this->currentUserID);

    }
}