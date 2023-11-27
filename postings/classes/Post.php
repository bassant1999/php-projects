<?php
class Post
{
    private $user_id;
    private $text;

    public function __construct($user_id, $text)
    {
        $this->user_id = $user_id;
        $this->text = $text;
    }
    public function add_post()
    {
        include('classes/Db.php'); 
        $db= new Db("localhost", "root", "", "trial");
        $conn = $db->connect();
        $sql = "INSERT INTO `posts`(`user`, `text`) VALUES ('$this->user_id','$this->text')";
        if ($conn->query($sql) === TRUE) 
        {
            header("location:index.php");
        } else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

