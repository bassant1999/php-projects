<?php session_start();?>
<?php
    $data = json_decode(file_get_contents("php://input"));
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $conn= new mysqli("localhost:3307", "root", "", "library");
        $title = $data->title;
        $author = $data->author;
        $description = $data->description;
        $img_url = $data->img_url;
        $added_by = $data->added_by;

        $sql = "INSERT INTO Book (title, author, description, img_url, added_by)
        VALUES ('$title', '$author', '$description', '$img_url' ,$added_by)";

        if ($conn->query($sql) === TRUE) 
        {
            $response[] = array('status'=>1);       
        } 
        else 
        {
            $response[] = array('status'=>0);
        }

        echo json_encode($response);
        exit;
    }
?>


