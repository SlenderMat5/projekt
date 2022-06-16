<?php
$dbc = mysqli_connect('localhost', 'root', '', 'projekt') or
die('Error connecting to MySQL server.'. mysqli_connect_error());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracija</title>
    <link rel="stylesheet" href="administracija_style.css">
</head>
<body>
    <form action="administracija.php" method="post">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Login">
    </form>
    
    <br>
    <a href="register.php">Don't have an account jet? register here.</a>
</body>
</html>
