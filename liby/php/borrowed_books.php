<?php session_start();?>
<?php
    // $data = json_decode(file_get_contents("php://input"));
    if ($_SERVER["REQUEST_METHOD"] == "GET") 
    {
        $user_id = $_GET["userId"];
        $conn= new mysqli("localhost:3307", "root", "", "library");
        $sql = "SELECT *
        FROM Borrow
        INNER JOIN book ON Borrow.book_id=book.id
        WHERE user_id ='$user_id'";

        $result = $conn->query($sql);

        $books = array();

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                // array_push($books,$row["id"]);
                array_push($books, array("row"=>$row));
            //   echo $row["id"]. " - Name: " . $row["title"]. " " . $row["description"]. "<br>";
            }
        } 
        echo json_encode($books);
        exit;
    }
?>


