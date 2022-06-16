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
    <?php
    if($_SESSION['username']!=null){
        echo "<div id=\"gumb\"></div>";
    }

    include 'nav.php';
    ?>

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
            $password=$_POST['password'];
            $role="user";
            $sql="SELECT * FROM korisnici WHERE ime = '".$username."' ";
            $result= mysqli_query($dbc,$sql);
                if($result){
                    $row=$result->fetch_assoc();
                    if(password_verify($password, $row['lozinka'])){
                        $_SESSION['username']=$username;
                        $_SESSION['password']=$password;
                        $_SESSION['role']=$row['uloga'];
                        
                        echo "<a href=\"index.php\">Succesful login! Continue.";
                    }
                    else {
                         echo "Incorect password.";
                        }
            }
            else{
                echo "No username found? Maby register";

            }
        
    }
    ?>

    <script>
        if(document.getElementById("gumb")!=null){
        window.open("racun.php", "_self");
        }
    </script>
    
    <br>
    <a href="register.php">Don't have an account jet? register here.</a>
</body>
</html>
