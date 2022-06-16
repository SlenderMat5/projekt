<?php
$dbc = mysqli_connect('localhost', 'root', '', 'projekt') or
die('Error connecting to MySQL server.'. mysqli_connect_error());
$result=mysqli_query($dbc,"SELECT `novosti`.*, `slike`.`ime` AS ime_slike FROM novosti INNER JOIN `slike` ON `novosti`.`slika_id`=`slike`.`id_slike` WHERE id_novosti={$_GET['id']} LIMIT 3");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['naslov']; ?></title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
    include 'nav.php';
?>

<h2><?php echo $row['naslov']; ?></h2>
<img src="images/<?php echo $row['ime_slike']?>.jpg" alt="<?php echo $row['ime_slike']?>">
<p>
    <?php
    echo $row['tekst'];
    ?>
</p>
    <?php
    include 'footer.php';
    ?>
</body>
</html>