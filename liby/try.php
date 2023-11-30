<?php 
session_start();
echo $_SESSION["login"];
echo $_SESSION["user_id"];
echo $_SESSION["type"];

$a=array();
array_push($a,"blue","yellow");
echo  $a[0];
echo $a[1];
print_r($a);
$b=array("red","green");
print_r($b);

echo "\n \r <br> \n \r";

$conn= new mysqli("localhost:3307", "root", "", "library");
        $sql = "SELECT * FROM book";
        $result = $conn->query($sql);

        $books = array();

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) {
                array_push($books, array($row["id"]=>$row));
            //   $ $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } 
        echo json_encode($books);

echo "\n \r <br> \n \r";
echo "\n \r <br> \n \r";


echo json_encode(array('status'=>0));



?>