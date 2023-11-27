<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- link to stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Home page</title>

</head>

<body>
  <?php 
    include('partials/menu.php');
    include('classes/Db.php'); 
    include('partials/footer.php');
    ?>


<?php
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);
?>

  <script src="js/bootstrap.js"></script>
  <script src="js/bank.js"></script>

</body>
<html>