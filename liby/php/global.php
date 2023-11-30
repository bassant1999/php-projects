<?php 
    session_start();

    if($_SESSION["login"] == 0)
    {
        $response[] = array('status'=>0);
    }
    else
    {
        $response[] = array('status'=>1, 'type' => $_SESSION["type"], "user_id" => $_SESSION["user_id"]);
    }

    echo json_encode($response);


?>