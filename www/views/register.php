<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="/resources/design.css"/>
</head>
<html>
<body>
<?php require "_header.php" ?>
<div class="registersquare">
    <form action="/TastyRecipe/View/Register" method="post">
        <?php if (is_string($registerError)) { ?>
            <p class="errormessage"><?= $registerError ?></p>
        <?php } ?>
        <fieldset>
            <p>Hi new user.</p>
            <br>
            Username:<br>
            <input type="text" name="username"><br>
            Password:<br>
            <input type="password" name="password"><br><br>

            <input type="submit" value="Register"> <br>
        </fieldset>
    </form>
</div>
</body>
</html>