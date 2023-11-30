<?php session_start();?>
<?php
    $data = json_decode(file_get_contents("php://input"));
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $conn= new mysqli("localhost:3307", "root", "", "library");
        $mail = $data->username;
        $pwd = $data->password;

        $sql = "SELECT * FROM users WHERE mail='$mail'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) 
        {
            $row = $result->fetch_assoc();
            if($row["pwd"] != $pwd) {
                $_SESSION["login"] = 0;
                $response[] = array('status'=>0);
                // header("location:../login.html");
            }
            else{
                $_SESSION["login"] = 1;
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["type"] = $row["type"];
                $response[] = array('status'=>1, "user_id" => $row["id"], "type" => $row["type"]);
                // header("location:../index.html");
            }
        } 
        else 
        {
            $_SESSION["login"] = 0;
            $response[] = array('status'=>0);
            // header("location:../login.html");
        }
    }
    echo json_encode($response);
    exit;
?>


