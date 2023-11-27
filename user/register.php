<?php 
session_start();
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('classes/Db.php'); 
        $db= new Db("localhost", "root", "", "trial");
        $conn = $db->connect();
        $name = $_POST["name"];
        $mail = $_POST["mail"];
        $pwd = $_POST["pwd"];

        $sql = "SELECT mail FROM users WHERE mail='$mail'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            $_SESSION["reg"] = 1;
        } else 
        {
            $sql = "INSERT INTO users (name,mail,pwd) VALUES ('$name', '$mail', '$pwd')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION["reg"] = 2;
                header("location:login.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $_SESSION["reg"] = 1;
            }
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
    <title>Register page</title>
</head>

<body>
    <?php include('partials/menu.php'); ?>

    <!-- registration section starts Here -->
    <?php 
    $dis= "none";
    if(isset($_SESSION["reg"])) {
        if($_SESSION["reg"] == 1) {
            $dis = "block";
        }
    }
    ?>

    <div class="container register_form">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <hr>
            <h3>REGISTRATION FORM</h3>
            <hr>
            <div class="alert alert-danger" role="alert"style= "<?php echo"display:".$dis; ?>">This mail already exist</div>
            <div>
                <div class="mb-3">
                    <label for="name">Name:</label><br>
                    <input type="text" class="form-control" name="name" placeholder="Name..">
                </div> 
                <div class="mb-3">
                    <label for="mail">Email Address:</label><br>
                    <input type="email" class="form-control" name="mail" placeholder="email">
                </div>
                <div class="mb-3">
                    <label for="pwd">password:</label><br>
                    <input  type="password" class="form-control"  name="pwd">
                </div>
            </div>
            <input class ="submit" type="submit" value="Register">
        </form>
    </div>
    <!-- registration section ends Here -->

    <!-- footer starts Here -->
    <?php include('partials/footer.php'); ?>
    <!-- footer ends Here -->
    
</body>
<html>