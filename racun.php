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
    <title><?php echo $_SESSION['username'];?></title>
</head>
<body>
<?php
    include 'nav.php';
?>
<nav>
    <h2>
        Hello <?php echo $_SESSION['username'];?>
    </h2>
</nav>
<main>

</main>
<?php
    include 'footer.php';
?>
</body>
</html>