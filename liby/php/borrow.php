<?php session_start();
    if ($_SERVER["REQUEST_METHOD"] == "GET") 
    {
        $book_id = $_GET["bookId"];
        $user_id = $_GET["userId"];

        $conn= new mysqli("localhost:3307", "root", "", "library");

        $sql = "SELECT * FROM Borrow WHERE user_id ='$user_id' AND book_id = '$book_id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) 
        {
            $sql = "INSERT INTO Borrow (user_id, book_id)
            VALUES ($user_id, $book_id)";

            if ($conn->query($sql) === TRUE) 
            {
                $response[] = array('status'=>1);
            } else 
            {
                $response[] = array('status'=>0);
            }
        } 
        else 
        {
            $response[] = array('status'=>0);
        }
        echo json_encode($response);
        // exit;
    }
    
?>


