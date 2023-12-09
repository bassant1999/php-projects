<!-- create router -->
<?php
session_start();

require_once '../vendor/autoload.php';
require '../app/core/init.php';


$app = new App;
$app->loadController();

echo "\n \r php active record: n \r";
// initialize ActiveRecord
// change the connection settings to whatever is appropriate for your mysql server
\ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_model_directory('../core/models');
    $cfg->set_connections(['development' => 'mysql://root:@localhost/laravel']);
});

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
