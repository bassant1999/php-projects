<?php session_start();?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_SESSION["user_id"];
        $text = $_POST["text"];
        include('classes/Post.php'); 
        // echo $user_id;
        // echo $_SESSION["user_id"];
        $post = new Post($user_id , $text);
        $post->add_post();

       
    }
?>