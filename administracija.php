<?php

session_start();
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

    <?php
        if(! empty($_POST['username'])){
            $username=$_POST['username'];
            $password=password_hash($_POST['password'], CRYPT_BLOWFISH);
            $role="user";
            $sql="SELECT * FROM korisnici WHERE ime = ? ";
            $stmt=mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)){
                mysqli_stmt_bind_param($stmt,'s',$username);
                $result= mysqli_stmt_execute($stmt);
                if(password_verify($password, $result['lozinka'])){
                $_SESSION['username']=$username;
                $_SESSION['password']=$password;
                $_SESSION['role']=$result['uloga'];

                }
            }
        }
    ?>

    <script>
        console.log(document.getElementById("gumb"));
       /* getElementById("gumb").onclick = function (event) {
        var slanje_forme=true;
         //kod koji ispituje da li treba slati formu
        if (slanje_forme!=true) event.preventDefault();
        } */
    </script>
    
    <br>
    <a href="register.php">Don't have an account jet? register here.</a>
</body>
</html>
