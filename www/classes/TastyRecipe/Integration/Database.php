<?php

namespace TastyRecipe\Integration;

use function pg_connect;
use function pg_execute;
use function pg_fetch_all;
use function pg_fetch_assoc;
use function pg_prepare;

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connection = pg_connect('dbname=sem3 user=sem3-restricted password=QaC9MWzf');
    }

    public static function get()
    { // singleton pattern. första gången den ropas på, skapas en anslutning.
        static $db;                 // ropa på get igen, används den gamla, ny skapas ej
        if ($db === null) {
            $db = new Database();
        }
        return $db;
    }

    function findByUsername($username)
    {
        pg_prepare($this->connection, "", 'SELECT id, username, password FROM users WHERE username = $1');
        $response = pg_execute("", [$username]);
        return pg_fetch_assoc($response);
    }

    function createUser($username, $password)
    {
        pg_prepare($this->connection, "", 'INSERT INTO users(username, password) VALUES ($1, $2)'); // 1 = username 2 = password
        $result = pg_execute($this->connection, "", [
            $username,
            $password]);
        if ($result === false) {
            throw new UsernameConflictException();
        }
        return true;
    }

    function commentsForRecipe($recipe)
    {
        pg_prepare($this->connection, "", 'SELECT "username", "user", content, date, recipe, comments.id FROM comments 
        JOIN users ON  comments."user" = users.id WHERE recipe = $1');
        // JOIN users ON comments, merging two tables since username only exists in usertable and not comments
        $response = pg_execute($this->connection, "", [$recipe]);
        return pg_fetch_all($response);

    }

    function postComment($user, $content, $recipe)
    {
        pg_prepare($this->connection, "", 'INSERT INTO comments("user",content,recipe) VALUES ($1,$2,$3)');
        return pg_execute($this->connection, "", [$user, $content, $recipe]);

    }

    function deleteComment($commentId, $currentUserId)
    {
        pg_prepare($this->connection, "", 'DELETE FROM comments WHERE id = $1 AND "user" = $2');
        return pg_execute($this->connection, "", [$commentId, $currentUserId]);
    }

}