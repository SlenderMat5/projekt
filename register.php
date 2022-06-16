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
        <label for="password">Repeat password</label><br>
        <input type="r_password" name="r_password" id="r_password" required><br>
        <input type="submit" id="sub" value="Register">
    </form>

    <script>
        document.getElementById("sub").onclick = function (event) {
        var slanje_forme=true;
        let pass1=document.getElementsById("password").value;
        let pass2=document.getElementsById("r_password").value;
         if( pass1.localeCompare(pass2)!=0){
            slanje_forme=false;
         }
        if (slanje_forme!=true) event.preventDefault();
        } 
    </script>

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