<?php session_start();?>
<?php
$dis ="none";
if(isset($_SESSION["login"])) {
    if($_SESSION["login"] == 0){
        $dis = "block";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- link to stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Login page</title>
</head>

<body>
    <!-- navbar -->
    <?php include('partials/menu.php');?>

    <!-- login section start Here -->
    <div class="login_form">
        <div class="alert alert-danger" role="alert"style= "<?php echo"display:".$dis; ?>">Wrong mail or Wrong password</div>
        <form  action="validation.php" method="post">
            <hr>
            <h3>LOGIN</h3>
            <hr>
            <div>
                <div class="mb-3">
                    <label for="mail">Email Address:</label><br>
                    <input type="email" class="form-control" name="mail" placeholder="email">
                </div>
                <div class="mb-3">
                    <label for="pwd">password:</label><br>
                    <input  type="password" class="form-control"  name="pwd">
                </div>
            </div>
            <input class ="submit" type="submit" value="Login">
            <br><br>
            <a href="register.php"> Not a memeber? Register Here</a>
        </form>
    </div>
    <!-- login section ends Here -->

    <!-- footer starts Here -->
    <?php include('partials/footer.php'); ?>
    <!-- footer ends Here -->
    
</body>
<html>