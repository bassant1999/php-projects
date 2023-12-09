<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Home page view</h1>
    <?php
     if(!isset($_SESSION["login"]) or $_SESSION["login"] == 0) {
        ?>
        <a href="login">Login</a>
        <?php
     }
     elseif($_SESSION["login"] == 1)
     {
        echo $_SESSION["user_id"];
        ?>
        <a href="logout">Logout</a>
        <?php
     }
    ?>
    
    <img src="<?php echo ROOT; ?>/assets/images/no_image.jpg">
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=laravel", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
    ?>
    <?php
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

        class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current() {
            return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
        }

        function beginChildren() {
            echo "<tr>";
        }

        function endChildren() {
            echo "</tr>" . "\n";
        }
        }

        $servername = DBHOST;
        $username = DBUSER;
        $password = DBPASS;
        $dbname = DBNAME;

        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $stmt = $conn->prepare("SELECT id, name, email FROM users");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }
        } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
        ?>
</body>
</html>


