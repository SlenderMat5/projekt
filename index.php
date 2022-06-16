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
    <link rel="stylesheet" href="style.css">
    <title>0246098811</title>
</head>
<body>
    <?php
    include 'nav.php';
    ?>

    <main>
    <h2>POLITIQUE</h2>
        <section id="politique">
            <?php
            $sql="SELECT * FROM `novosti` WHERE kategorija='politique' LIMIT 3";
            $result = mysqli_query($dbc, $sql);
            while($row = mysqli_fetch_array($result)) {
                echo "<article>";
                echo "  <img src=".$row['slika'].">";
                echo "<h3><a href=\"news.php?id=".$row['id_novosti']."\">".$row['naslov']."</a></h3>";
                echo "<p>".$row['datum']."</p>";
                echo "</article>";
            }

            ?>
        </section> 
        <hr>       
        <h2>IMMOBILIER</h2>
        <section id="immobilier">
            <?php
            $sql="SELECT * FROM `novosti` WHERE kategorija='immobilier' LIMIT 3";
            $result = mysqli_query($dbc, $sql);
            while($row = mysqli_fetch_array($result)) {
                echo "<article>";
                echo "  <img src=".$row['slika'].">";
                echo "<h3><a href=\"news.php?id=".$row['id_novosti']."\">".$row['naslov']."</a></h3>";
                echo "<p>".$row['datum']."</p>";
                echo "</article>";
            }
            ?>
        </section>     
    </main>

    <?php
    include 'footer.php';
    ?>
</body>
</html>