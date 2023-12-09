<?php 

namespace Controller;

use Model\User;

// defined('ROOTPATH') OR exit('Access Denied!');

/**
 * home class
 */
class Login extends Controller
{
	// use MainController;

	public function index()
	{
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            print_r($_POST);
            echo $mail = $_POST["user_name"];
            echo $pwd = $_POST["password"];
            $user = new User();
            echo "\n \r";
            $result = $user->where(['email'=>$mail, "password"=>$pwd]);
            if($result)
            {
                print_r($result[0]["id"]);
                $_SESSION["login"] = 1;
                $_SESSION["user_id"] = $result[0]["id"];
                // $_SESSION["type"] = $row["type"];
                // $response[] = array('status'=>1, "user_id" => $row["id"], "type" => $row["type"]);
                header("location:../");
            }
            else
            {
                $_SESSION["login"] = 0;
                $response[] = array('status'=>0);
                header("location:../login");
            }

            // $sql = "SELECT * FROM users WHERE mail='$mail'";
            // // $result = $conn->query($sql);
            // $user = new User();
            // $result = $user->where(['mail'=>$mail]);
            // if ($result->num_rows == 1) 
            // {
            //     $row = $result->fetch_assoc();
            //     if($row["pwd"] != $pwd) {
            //         $_SESSION["login"] = 0;
            //         $response[] = array('status'=>0);
            //         // header("location:../login.html");
            //     }
            //     else{
            //         $_SESSION["login"] = 1;
            //         $_SESSION["user_id"] = $row["id"];
            //         $_SESSION["type"] = $row["type"];
            //         $response[] = array('status'=>1, "user_id" => $row["id"], "type" => $row["type"]);
            //         // header("location:../index.html");
            //     }
            // } 
            // else 
            // {
            //     $_SESSION["login"] = 0;
            //     $response[] = array('status'=>0);
            //     // header("location:../login.html");
            // }
        }
        else{
		$this->view('login');
            
        }
	}

}