<!-- create router -->
<?php
session_start();

require '../app/core/init.php';

$app = new App;
$app->loadController();

// class App 
// {
//     private function splitURL()
//     {
//         $URL = $_GET['url'] ?? "home";
//         $URL = explode("/", $URL);
//         return $URL;
//     }

//     private function loadController()
//     {
//         $URL = splitURL();
//         $filename = "../app/controllers/".ucfirst($URL[0]).".php";
//         // echo $filename ." ". $URL[0]."\n";
//         if(file_exists($filename))
//         {
//             // echo "here";
//             require $filename; 
//         }
//         else
//         {
//             $filename = "../app/controllers/_404.php";
//             require $filename; 
//         }

//     }
// }
