<?php
/**
 * Created by IntelliJ IDEA.
 * User: kimte
 * Date: 2016-09-23
 * Time: 16:23
 */

namespace TastyRecipe\Model;


use TastyRecipe\Integration\Database;

class Comment
{
    public $id, $user, $username, $content, $date;

    public function __construct($id, $user, $username, $content, $date)
    {
        $this->id = $id;
        $this->user = $user;
        $this->username = $username;
        $this->content = $content;
        $this->date = new \DateTime($date); // får ISO-formaterad string från databasen
    }

    public static function commentsForRecipe($title){
        $comments = [];
        foreach (Database::get()->commentsForRecipe($title) as $comment) {
            $comments[] = new Comment(
                $comment['id'],
                $comment['user'],
                $comment['username'],
                $comment['content'],
                $comment['date']
            );
        }
        return $comments;
    }

    public static function postNew($user, $content, $recipe){
        Database::get()->postComment($user, $content, $recipe);
    }

    public static function deleteComment($commentID, $user){
        Database::get()->deleteComment($commentID, $user);
    }

}