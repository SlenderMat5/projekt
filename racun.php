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
    <link rel="stylesheet" href="style.css">
    <title><?php echo $_SESSION['username'];?></title>
    <style>
    .grid-container {
    display: grid;
    grid-template-areas: 
    'left middle middle middle middle middle' 
    grid-column-gap: 10px;
    } 

    aside {
    grid-area: left;
    }

    main {
    grid-area: middle;
    }

    @media (max-width: 600px) {
    .grid-container  {
        grid-template-areas: 
        'middle middle middle middle middle middle' 
        'left left left left left left' 
    }
    }
    </style>
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
<div class="grid-container">
<main>
 
</main>
<aside>
    
</aside>
</div>
<?php
    include 'footer.php';
?>
</body>
</html>