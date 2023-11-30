<?php session_start();?>
<?php
    $data = json_decode(file_get_contents("php://input"));
    if ($_SERVER["REQUEST_METHOD"] == "GET") 
    {
        $conn= new mysqli("localhost:3307", "root", "", "library");
        $sql = "SELECT * FROM book";
        $result = $conn->query($sql);

        $books = array();

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                // array_push($books,$row["id"]);
                array_push($books, array("row"=>$row));
            //   $ $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } 
        echo json_encode($books);
        exit;
    }
?>


