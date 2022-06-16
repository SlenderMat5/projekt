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
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="post">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Register">
    </form>
    <?php
    if(! empty($_POST['username'])){
        $username=$_POST['username'];
        $password=password_hash($_POST['password'], CRYPT_BLOWFISH);
        $role="user";
        $sql="INSERT INTO korisnici (ime, lozinka, uloga) VALUES (?, ?, ?)";
        $stmt=mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt,'sss',$username,$password,$role);
            mysqli_stmt_execute($stmt);
            echo "<br><a href=\"index.php\"> Registracija uspjesna, nastavi</a>";
        }
    }
    ?>
</body>
</html>