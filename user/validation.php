<?php session_start();?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('classes/Db.php'); 
        $db= new Db("localhost", "root", "", "trial");
        $conn = $db->connect();
        $mail = $_POST["mail"];
        $pwd = $_POST["pwd"];

        $sql = "SELECT * FROM users WHERE mail='$mail'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if($row["pwd"] != $pwd) {
                $_SESSION["login"] = 0;
                header("location:login.php");
            }
            else{
                $_SESSION["login"] = 1;
                $_SESSION["user_id"] = $row["id"];
                header("location:index.php");
            }
        } else {
            $_SESSION["login"] = 0;
            header("location:login.php");
        }
    }
?>