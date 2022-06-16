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

    aside .racun{
    
    grid-area: left;
    }

    main .racun{
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
<main class="racun">
    <form action="news_manager.php" method="post" enctype="multipart/form-data">
        <label for="naslov">Naslov:</label><br>
        <input type="text" name="naslov" id="naslov"><br>
        <label for="fileToUpload">Naslovna slika</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <label for="sadrzaj">Sadržaj</label><br>
        <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Publish">
    </form>
    
</main>
<aside class="racun">
<?php
            $sql="SELECT * FROM `novosti` WHERE autor_id='".$_SESSION['id']."' LIMIT 3";
            $result = mysqli_query($dbc, $sql);
            while($row = mysqli_fetch_array($result)) {
                echo "<article>";
                echo "  <img src=".$row['slika'].">";
                echo "<h3><a href=\"news.php?id=".$row['id_novosti']."\">".$row['naslov']."</a></h3>";
                echo "<p>".$row['datum']."</p>";
                echo "</article>";
            }

            ?>
</aside>
</div>
<form action="logout.php" method="post">
    <input type="submit" value="Logout">
</form>
<?php
    include 'footer.php';
?>
</body>
</html>