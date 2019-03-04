<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/resources/design.css"/>
</head>
<html>
<body>
<?php require "_header.php" ?>
<div class="loginsquare">
    <form method="post">
        <?php if ($loginError) { ?>
            <p class="errormessage"><?= $loginError ?></p>
        <?php } ?>
        <p>Welcome back user.</p>
        <br>
        Username:<br>
        <input type="text" name="username"><br>
        Password:<br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>

</div>
</body>
</html>